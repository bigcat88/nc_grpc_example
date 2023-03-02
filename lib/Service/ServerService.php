<?php

declare(strict_types=1);

/**
 * @copyright Сopyright (c) 2023 Andrey Borysenko <andrey18106x@gmail.com>
 *
 * @copyright Сopyright (c) 2023 Alexander Piskun <bigcat88@icloud.com>
 *
 * @author 2023 Andrey Borysenko <andrey18106x@gmail.com>
 *
 * @license AGPL-3.0-or-later
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\NC_GRPC_Example\Service;

use OCP\Files\IAppData;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Grpc\RpcServer;
use Grpc\ClientStreamingCall;
use Grpc\ServerStreamingCall;

use OCA\NC_GRPC_Example\Proto\TaskInitReply;
use OCA\NC_GRPC_Example\Proto\TaskInitReply\cfgOptions;
use OCA\NC_GRPC_Example\Proto\FsCreateReply;
use OCA\NC_GRPC_Example\Proto\FsNodeInfo;
use OCA\NC_GRPC_Example\Proto\FsReadReply;
use OCA\NC_GRPC_Example\Proto\FsReply;
use OCA\NC_GRPC_Example\Proto\taskType;

use OCA\NC_GRPC_Example\Framework\Core;
use OCA\NC_GRPC_Example\Framework\Fs;

class ServerService {
	public static $APP = null;

	/** @var LoggerInterface */
	public static $staticLogger;

	/** @var Core */
	private $cpaCore;

	/** @var Fs */
	private $cpaFs;

	/** @var LoggerInterface */
	private $logger;

	public function __construct(
		Core $cpaCore,
		Fs $cpaFs,
		LoggerInterface $logger
	) {
		$this->cpaCore = $cpaCore;
		$this->cpaFs = $cpaFs;
		$this->logger = $logger;
	}

	public function runGrpcServer(
		string $hostname = '0.0.0.0',
		string $port = '50051',
		array $appInfo = []
	) {
		self::$APP = $appInfo;
		self::$staticLogger = $this->logger;
		/** @var RpcServer */
		$server = $this->cpaCore->createServer([
			'hostname' => $hostname,
			'port' => $port
		]);
		// TODO Add running pyfrm
		// $pyfrmResult = $this->cpaCore->runPyfrm();
		$server->run();
		// $this->logger->info('[' . self::class . '] pyfrmResult: ' . json_encode($pyfrmResult));
	}

	public static function testHandler(string $result = null) {
		self::$staticLogger->info('[' . self::class . '] testHandler executed, result: ' . $result);
	}

	public function testTaskInit(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$pid = $this->createServerMock($hostname, $port);
		if ($pid !== -1) {
			sleep(1);
			$output->writeln('Server started [pid:' . $pid . '] ... Creating client.');
			$client = $this->cpaCore->createClient([
				'hostname' => $hostname,
				'port' => $port,
			]);
			/** @var TaskInitReply $response */
			list($response, $status) = $this->cpaCore->TaskInit($client);
			if (isset($status)) {
				$output->writeln('Response status: ' . json_encode($status));
			}
			if (isset($response)) {
				$output->writeln('Response: ');
				$output->writeln('cmdType: ' . taskType::name($response->getCmdType()));
				$output->writeln('appname: ' . $response->getAppName());
				$output->writeln('handler: ' . $response->getHandler());
				$output->writeln('modpath: ' . $response->getModPath());
				$output->writeln('funcname: ' . $response->getFuncName());
				if ($response->getArgs() !== null) {
					$output->write('args:');
					foreach ($response->getArgs() as $argument) {
						$output->write(' ' . $argument);
					}
					$output->writeln('');
				}
				$output->writeln('Config: ');
				/** @var cfgOptions */
				$cfg = $response->getConfig();
				$output->writeln('userId: ' . $cfg->getUserId());
				$output->writeln('logLvl: ' . $cfg->getLogLvl());
				$output->writeln('frameworkAppData: ' . $cfg->getDataFolder());
				$output->writeln('useFileDirect: ' . json_encode($cfg->getUseFileDirect()));
				$output->writeln('useDBDirect: ' . json_encode($cfg->getUseDBDirect()));
				$dbCfg = $response->getDbCfg();
				$output->writeln('dbhost: ' . $dbCfg->getDbHost());
				$output->writeln('dbtype: ' . $dbCfg->getDbType());
				$output->writeln('dbname: ' . $dbCfg->getDbName());
				$output->writeln('dbuser: ' . $dbCfg->getDbUser());
				$output->writeln('dbpass: ' . $dbCfg->getDbPass());
				$output->writeln('dbprefix: ' . $dbCfg->getDbPrefix());
				$output->writeln('iniHost: ' . $dbCfg->getIniDbHost());
				$output->writeln('iniPort: ' . $dbCfg->getIniDbPort());
				$output->writeln('iniSocket: ' . $dbCfg->getIniDbSocket());
				$output->writeln('dbDriverSslKey: ' . $dbCfg->getDbDriverSslKey());
				$output->writeln('dbDriverSslCert: ' . $dbCfg->getDbDriverSslCert());
				$output->writeln('dbDriverSslCa: ' . $dbCfg->getDbDriverSslCa());
				$output->writeln('dbDriverSslVerifyCrt: ' . $dbCfg->getDbDriverSslVerifyCrt());
			}
			$output->writeln('Closing server...');
			$this->cpaCore->TaskExit($client, ['result' => 'TaskInit successfull']);
		} else {
			$output->writeln('Server not started...');
		}
	}

	public function testTaskStatus(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$stCode = $input->getArgument('stCode');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		$this->cpaCore->TaskLog($client, ['stCode' => $stCode]);
	}

	public function testTaskExit(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$result = $input->getArgument('result');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		$this->cpaCore->TaskExit($client, ['result' => $result]);
		$output->writeln('TaskExit request sent. Server closed.');
	}

	public function testTaskLog(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$logLvl = $input->getArgument('logLvl');
		$module = $input->getArgument('module');
		$content = $input->getArgument('content');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		$this->cpaCore->TaskLog($client, [
			'logLvl' => $logLvl,
			'module' => $module,
			'content' => json_decode($content) !== null ? json_decode($content) : [$content],
		]);
	}

	public function testGetFileInfo(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$userid = $input->getArgument('userid');
		$fileid = $input->getArgument('fileid');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		list($response, $status) = $this->cpaFs->FsInfo($client, [
			'userid' => $userid,
			'fileid' => $fileid,
		]);
		$output->writeln('Response status: ' . json_encode($status));
		if ($response !== null && count($response->getNodes()) > 0) {
			$output->writeln('Response items:');
			/** @var FsNodeInfo $responseNode */
			foreach ($response->getNodes() as $responseNode) {
				$output->writeln($responseNode->getFileId()->getFileId() . '. ' . $responseNode->getName() . ' (' . $responseNode->getSize() . ' bytes)');
			}
		}
	}

	public function testFsList(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$userid = $input->getArgument('userid');
		$fileid = $input->getArgument('fileid');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		list($response, $status) = $this->cpaFs->FsList($client, [
			'userid' => $userid,
			'fileid' => $fileid,
		]);
		$output->writeln('Response status: ' . json_encode($status));
		if ($response !== null && count($response->getNodes()) > 0) {
			$output->writeln('Response items:');
			/** @var FsNodeInfo $responseNode */
			foreach ($response->getNodes() as $responseNode) {
				$output->writeln($responseNode->getFileId()->getFileId() . '. ' . $responseNode->getName() . ' (' . $responseNode->getSize() . ' bytes)');
			}
		}
	}

	public function testFsReadFile(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$userid = $input->getArgument('userid');
		$fileid = $input->getArgument('fileid');
		$offset = $input->getArgument('offset');
		$length = $input->getArgument('length');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		/** @var ServerStreamingCall */
		$call = $this->cpaFs->FsRead($client, [
			'userid' => $userid,
			'fileid' => $fileid,
			'offset' => $offset,
			'bytesToRead' => $length
		]);
		$output->writeln('Responses: ');
		/** @var FsReadReply $response */
		foreach ($call->responses() as $response) {
			$output->writeln('Res code: ' . $response->getResCode());
			$output->writeln('Last: ' . json_encode(boolval($response->getLast())));
			$output->writeln('Content: ' . $response->getContent());
		}
		$client->close();
	}

	public function testFsWriteFile(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$userid = $input->getArgument('userid');
		$fileid = $input->getArgument('fileid');
		$content = $input->getArgument('content');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		/** @var ClientStreamingCall */
		$call = $this->cpaFs->FsWrite($client);
		foreach (str_split($content, Fs::CHUNK_SIZE) as $content) {
			$data = $this->cpaFs->createFsWriteRequest([
				'userid' => $userid,
				'fileid' => $fileid,
				'content' => $content,
			]);
			$output->writeln('Writing: ' . $data->getContent());
			$call->write($data);
		}
		/** @var FsReply */
		list($response, $status) = $call->wait();
		$output->writeln('Status: ' . json_encode($status));
		$output->writeln('Response: ' . json_encode($response->getResCode()));
	}

	public function testFsCreateFile(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$userid = $input->getArgument('userid');
		$parentDirId = $input->getArgument('parentdirid');
		$name = $input->getArgument('name');
		$isFile = $input->getArgument('isfile');
		$content = $input->getArgument('content');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		/** @var FsCreateReply $response */
		list($response, $status) = $this->cpaFs->FsCreate($client, [
			'userid' => $userid,
			'fileid' => $parentDirId,
			'name' => $name,
			'isFile' => $isFile,
			'content' => $content,
		]);
		$output->writeln('Response status: ' . json_encode($status));
		if (isset($response)) {
			$output->writeln('Response: ');
			$output->writeln('Res code: ' . $response->getResCode());
			$output->writeln('FileId: ' . $response->getFileId()->getFileId());
		}
	}

	public function testFsDeleteFile(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$userid = $input->getArgument('userid');
		$fileid = $input->getArgument('fileid');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		/** @var FsReply $response */
		list($response, $status) = $this->cpaFs->FsDelete($client, [
			'userid' => $userid,
			'fileid' => $fileid,
		]);
		$output->writeln('Response status: ' . json_encode($status));
		$output->writeln('Res code: ' . $response->getResCode());
	}

	public function testFsMoveFile(InputInterface $input, OutputInterface $output) {
		$hostname = $input->getArgument('hostname');
		$port = $input->getArgument('port');
		$userid = $input->getArgument('userid');
		$fileid = $input->getArgument('fileid');
		$targetPath = $input->getArgument('targetpath');
		$copy = $input->getArgument('copy');
		$client = $this->cpaCore->createClient(['hostname' => $hostname, 'port' => $port]);
		/** @var FsReply $response */
		list($response, $status) = $this->cpaFs->FsMOve($client, [
			'userid' => $userid,
			'fileid' => $fileid,
			'targetPath' => $targetPath,
			'copy' => $copy
		]);
		$output->writeln('Response status: ' . json_encode($status));
		$output->writeln('Res code: ' . $response->getResCode());
	}

	/**
	 * Service function for creating test gRPC server
	 *
	 * @param string $hostname
	 * @param string|int $port
	 *
	 * @return int PID or `-1` on failure
	 */
	private function createServerMock($hostname, $port): int {
		return $this->cpaCore->runBgGrpcServer([
			'hostname' => $hostname,
			'port' => $port,
			'cmd' => taskType::T_CHECK,
			'userid' => 'admin',
			'appname' => 'mediadc',
			'handler' => '"\OCA\NC_GRPC_Example\Service\ServerService::testHandler"',
			'modpath' => '/var/www/html/nextcloud/apps/mediadc/lib/Service/python/install.py',
			'funcname' => 'check',
			'args' => null,
			// 'args' => json_encode([
			// 	'arg1' => 'arg1_value', // for arg=value pair
			// 	'arg2' => '', // for positional arg
			// ]),
		]);
	}
}
