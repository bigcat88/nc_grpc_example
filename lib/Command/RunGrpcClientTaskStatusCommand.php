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

namespace OCA\NC_GRPC_Example\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use OCA\NC_GRPC_Example\Service\ServerService;

class RunGrpcClientTaskStatusCommand extends Command {
	public const ARGUMENT_HOSTNAME = 'hostname';
	public const ARGUMENT_PORT = 'port';
	public const ARGUMENT_ST_CODE = 'stCode';

	/** @var ServerService */
	private $serverService;

	public function __construct(ServerService $serverService) {
		parent::__construct();

		$this->serverService = $serverService;
	}

	protected function configure(): void {
		$this->setName("nc_grpc_example:grpc:client:task:status");
		$this->setDescription("Run GRPC client TaskStatus request");
		$this->addArgument(self::ARGUMENT_HOSTNAME, InputArgument::REQUIRED);
		$this->addArgument(self::ARGUMENT_PORT, InputArgument::REQUIRED);
		$this->addArgument(self::ARGUMENT_ST_CODE, InputArgument::REQUIRED);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$this->serverService->testTaskStatus($input, $output);
		return 0;
	}
}
