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

use OCA\NC_GRPC_Example\Proto\NCGRPCExampleCoreStub;

use OCA\NC_GRPC_Example\Framework\Handle\CoreHandle;
use OCA\NC_GRPC_Example\Framework\Handle\FsHandle;
use OCA\NC_GRPC_Example\Framework\Handle\DbHandle;

class NCGRPCExampleCore extends NCGRPCExampleCoreStub {
	/** @var CoreHandle */
	private $core;

	/** @var FsHandle */
	private $fs;

	public function __construct(CoreHandle $core, FsHandle $fs) {
		$this->core = $core;
		$this->fs = $fs;
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\PBEmpty $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\TaskInitReply for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function TaskInit(
		\OCA\NC_GRPC_Example\Proto\PBEmpty $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\TaskInitReply {
		$context->setStatus(\Grpc\Status::ok());
		return $this->core->init($request);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\TaskSetStatusRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\PBEmpty for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function TaskStatus(
		\OCA\NC_GRPC_Example\Proto\TaskSetStatusRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\PBEmpty {
		$context->setStatus(\Grpc\Status::ok());
		return $this->core->status($request);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\TaskExitRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\PBEmpty for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function TaskExit(
		\OCA\NC_GRPC_Example\Proto\TaskExitRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\PBEmpty {
		$context->setStatus(\Grpc\Status::ok());
		return $this->core->exit($request);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\TaskLogRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\PBEmpty for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function TaskLog(
		\OCA\NC_GRPC_Example\Proto\TaskLogRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\PBEmpty {
		$context->setStatus(\Grpc\Status::ok());
		return $this->core->log($request);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\FsGetInfoRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\FsListReply for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function FsGetInfo(
		\OCA\NC_GRPC_Example\Proto\FsGetInfoRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\FsListReply {
		$context->setStatus(\Grpc\Status::ok());
		return $this->fs->info($request);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\FsListRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\FsListReply for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function FsList(
		\OCA\NC_GRPC_Example\Proto\FsListRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\FsListReply {
		$context->setStatus(\Grpc\Status::ok());
		return $this->fs->list($request);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\FsReadRequest $request client request
	 * @param \Grpc\ServerCallWriter $writer write response data of \OCA\NC_GRPC_Example\Proto\FsReadReply
	 * @param \Grpc\ServerContext $context server request context
	 * @return void
	 */
	public function FsRead(
		\OCA\NC_GRPC_Example\Proto\FsReadRequest $request,
		\Grpc\ServerCallWriter $writer,
		\Grpc\ServerContext $context
	): void {
		$context->setStatus(\Grpc\Status::ok());
		$this->fs->read($request, $writer);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\FsCreateRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\FsReply for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function FsCreate(
		\OCA\NC_GRPC_Example\Proto\FsCreateRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\FsCreateReply {
		$context->setStatus(\Grpc\Status::ok());
		return $this->fs->create($request);
	}

	/**
	 * @param \Grpc\ServerCallReader $reader read client request data of \OCA\NC_GRPC_Example\Proto\FsWriteRequest
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\FsReply for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function FsWrite(
		\Grpc\ServerCallReader $reader,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\FsReply {
		$context->setStatus(\Grpc\Status::ok());
		return $this->fs->write($reader);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\FsDeleteRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\FsReply for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function FsDelete(
		\OCA\NC_GRPC_Example\Proto\FsDeleteRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\FsReply {
		$context->setStatus(\Grpc\Status::ok());
		return $this->fs->delete($request);
	}

	/**
	 * @param \OCA\NC_GRPC_Example\Proto\FsMoveRequest $request client request
	 * @param \Grpc\ServerContext $context server request context
	 * @return \OCA\NC_GRPC_Example\Proto\FsReply for response data, null if if error occured
	 *     initial metadata (if any) and status (if not ok) should be set to $context
	 */
	public function FsMove(
		\OCA\NC_GRPC_Example\Proto\FsMoveRequest $request,
		\Grpc\ServerContext $context
	): ?\OCA\NC_GRPC_Example\Proto\FsMoveReply {
		$context->setStatus(\Grpc\Status::ok());
		return $this->fs->move($request);
	}
}
