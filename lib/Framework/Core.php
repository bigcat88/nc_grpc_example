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

namespace OCA\NC_GRPC_Example\Framework;

use OCA\NC_GRPC_Example\Service\UtilsService;

use Grpc\ServerStreamingCall;

use OCA\NC_GRPC_Example\Proto\NCGRPCExampleCoreClient;
use OCA\NC_GRPC_Example\Proto\PBEmpty;
use OCA\NC_GRPC_Example\Proto\TaskExitRequest;
use OCA\NC_GRPC_Example\Proto\TaskLogRequest;
use OCA\NC_GRPC_Example\Proto\TaskSetStatusRequest;
use OCA\NC_GRPC_Example\Proto\taskStatus;
use Psr\Log\LoggerInterface;

/**
 * NC_GRPC_Example Framework Core API
 */
class Core {
	/** @var NCGRPCExampleCore */
	private $cpa;

	/** @var UtilsService */
	private $utils;

	public function __construct(
		NCGRPCExampleCore $cpa,
		UtilsService $utils,
		LoggerInterface $logger
	) {
		$this->cpa = $cpa;
		$this->utils = $utils;
		$this->logger = $logger;
	}

	/**
	 * Run non-blocking gRPC server
	 *
	 * @param array $params hostname, port, userid, appname, handler,
	 *                      modname, modpath, funcname, args
	 *
	 * @return int gRPC server PID or `-1` on failure
	 */
	public function runBgGrpcServer(array $params = []): int {
		if (isset($params['hostname'])) {
			$hostname = $params['hostname'];
		}
		if (isset($params['port'])) {
			$port = $params['port'];
		}
		if (isset($params['cmd'])) {
			$cmd = $params['cmd'];
		}
		if (isset($params['userid'])) {
			$userid = $params['userid'];
		}
		if (isset($params['appname'])) {
			$appname = $params['appname'];
		}
		if (isset($params['handler'])) {
			$handler = $params['handler'];
		}
		if (isset($params['modpath'])) {
			$modpath = $params['modpath'];
		}
		if (isset($params['funcname'])) {
			$funcname = $params['funcname'];
		}
		$pathToOcc = getcwd() . '/occ';
		$cloudPyApiCommand = 'cloud_py_api:grpc:server:bg:run ' . $hostname . ' ' . $port
			. ' ' . $cmd . ' ' . $userid . ' ' . $appname . ' ' . $handler  . ' ' . $modpath . ' '
			. $funcname;
		if (isset($params['args'])) {
			$args = $params['args'];
			$cloudPyApiCommand += array_reduce(json_decode($args), function ($carry, $argument) {
				return $carry += ' ' . $argument;
			});
		}
		$command = $this->utils->getPhpInterpreter() . ' ' . $pathToOcc . ' ' . $cloudPyApiCommand
			. ' > /dev/null 2>&1 & echo $!';
		exec($command, $cmdOut);
		if (isset($cmdOut[0]) && intval($cmdOut[0]) > 0) {
			return intval($cmdOut[0]);
		}
		return -1;
	}

	/**
	 * Create GRPC server
	 *
	 * @param array $params hostname and port
	 *
	 * @return \Grpc\RpcServer|null
	 */
	public function createServer(array $params = []): ?\Grpc\RpcServer {
		if (extension_loaded('grpc')) {
			$server = new \Grpc\RpcServer();
			$hostname = '0.0.0.0';
			if (isset($params['hostname'])) {
				$hostname = $params['hostname'];
			}
			if (isset($params['port'])) {
				$hostname .= ':' . $params['port'];
			}
			$server->addHttp2Port($hostname);
			$server->handle($this->cpa);
			return $server;
		}
		return null;
	}

	/**
	 * Create GRPC client
	 *
	 * @param array $params hostname and port
	 *
	 * @return \OCA\NC_GRPC_Example\Proto\NCGRPCExampleCoreClient|null
	 */
	public function createClient(array $params = []): ?NCGRPCExampleCoreClient {
		if (isset($params['hostname'])) {
			$hostname = $params['hostname'];
		}
		if (isset($params['port'])) {
			$hostname .= ':' . $params['port'];
		}
		if (extension_loaded('grpc')) {
			$client = new NCGRPCExampleCoreClient($hostname, [
				'credentials' => \Grpc\ChannelCredentials::createInsecure()
			]);
			return $client;
		}
		return null;
	}

	public function runPyfrm(): array {
		// TODO Run Pyfrm to handle task
		return $this->pythonService->run('/pyfrm/main.py');
	}

	/**
	 * Send TaskInit request from given client
	 *
	 * @param \OCA\NC_GRPC_Example\Proto\NCGRPCExampleCoreClient $client
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\TaskInitReply,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function TaskInit($client): array {
		return $client->TaskInit(new PBEmpty())->wait();
	}

	/**
	 * Send TaskLog request
	 *
	 * @param \OCA\NC_GRPC_Example\Proto\NCGRPCExampleCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\PBEmpty,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function TaskStatus($client, $params = []): array {
		$request = new TaskSetStatusRequest();
		if (isset($params['stCode'])) {
			$request->setStCode(taskStatus::value(taskStatus::name($params['stCode'])));
		}
		return $client->TaskStatus($request)->wait();
	}

	/**
	 * Send TaskLog request
	 *
	 * @param \OCA\NC_GRPC_Example\Proto\NCGRPCExampleCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\PBEmpty,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function TaskLog($client, $params = []): array {
		$request = new TaskLogRequest();
		if (isset($params['logLvl'])) {
			$request->setLogLvl($params['logLvl']);
		}
		if (isset($params['module'])) {
			$request->setModule($params['module']);
		}
		if (isset($params['content'])) {
			$request->setContent($params['content']);
		}
		return $client->TaskLog($request)->wait();
	}

	/**
	 * Send TaskExit request with passing $result to initiator callback
	 * and closing server process
	 *
	 * @param \OCA\NC_GRPC_Example\Proto\NCGRPCExampleCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\PBEmpty,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function TaskExit($client, $params = []): array {
		$request = new TaskExitRequest();
		if (isset($params['result'])) {
			$request->setResult($params['result']);
		}
		return $client->TaskExit($request)->wait();
	}
}
