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

namespace OCA\NC_GRPC_Example\Framework\Handle;

use Grpc\ServerCallWriter;

use OCA\NC_GRPC_Example\Proto\PBEmpty;
use OCA\NC_GRPC_Example\Proto\TaskExitRequest;

use OCA\NC_GRPC_Example\Proto\TaskLogRequest;

use OCA\NC_GRPC_Example\Proto\logLvl;
use OCA\NC_GRPC_Example\Service\ServerService;
use Psr\Log\LoggerInterface;

class CoreHandle {
	/** @var LoggerInterface */
	private $logger;

	public function __construct(LoggerInterface $logger) {
		$this->logger = $logger;
	}

	/**
	 * Task exit
	 *
	 * @param TaskExitRequest $request
	 *
	 * @return PBEmpty|null
	 */
	public function exit(TaskExitRequest $request): ?PBEmpty {
		if (isset(ServerService::$APP['handler'])) {
			call_user_func(ServerService::$APP['handler'], $request->getResult());
		}
		exit(0); // Temporal workaround, because of bad GRPC implementation for PHP
		return new PBEmpty(null);
	}

	/**
	 * Task logging
	 *
	 * @param TaskLogRequest $request
	 *
	 * @return PBEmpty|null
	 */
	public function log(TaskLogRequest $request): ?PBEmpty {
		$logLvl = $request->getLogLvl();
		$msg = '';
		/** @var string $row */
		foreach ($request->getContent() as $row) {
			// fwrite($handle, $row . PHP_EOL);
			$msg .= $row . PHP_EOL;
		}
		if ($logLvl === logLvl::DEBUG) {
			$this->logger->debug('[' . $request->getModule() . '] ' . $msg !== '' ? $msg : $request->getContent());
		}
		if ($logLvl === logLvl::INFO) {
			$this->logger->info('[' . $request->getModule() . '] ' . $msg !== '' ? $msg : $request->getContent());
		}
		if ($logLvl === logLvl::ERROR) {
			$this->logger->error('[' . $request->getModule() . '] ' . $msg !== '' ? $msg : $request->getContent());
		}
		if ($logLvl === logLvl::FATAL) {
			$this->logger->emergency('[' . $request->getModule() . '] ' . $msg !== '' ? $msg : $request->getContent());
		}
		return new PBEmpty(null);
	}
}
