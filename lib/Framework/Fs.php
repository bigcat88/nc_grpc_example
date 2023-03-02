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

use OCA\NC_GRPC_Example\Proto\CloudPyApiCoreClient;
use OCA\NC_GRPC_Example\Proto\FsCreateRequest;
use OCA\NC_GRPC_Example\Proto\FsDeleteRequest;
use OCA\NC_GRPC_Example\Proto\FsGetInfoRequest;
use OCA\NC_GRPC_Example\Proto\fsId;
use OCA\NC_GRPC_Example\Proto\FsListRequest;
use OCA\NC_GRPC_Example\Proto\FsMoveRequest;
use OCA\NC_GRPC_Example\Proto\FsReadRequest;
use OCA\NC_GRPC_Example\Proto\FsWriteRequest;

/**
 * NC_GRPC_Example Framework FS API
 */
class Fs {
	// public const CHUNK_SIZE = 4096; // 4KB chunk size
	public const CHUNK_SIZE = 5; // 5B chunk size for testing

	/**
	 * Send FsList request
	 *
	 * @param CloudPyApiCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\FsListReply,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function FsList($client, $params = []): array {
		$request = new FsListRequest([]);
		$fsId = $this->createFsId($params);
		$request->setDirId($fsId);
		return $client->FsList($request)->wait();
	}

	/**
	 * Send FsGetInfo request
	 *
	 * @param CloudPyApiCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\FsListReply,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function FsInfo($client, $params = []): array {
		$request = new FsGetInfoRequest([]);
		$fsId = $this->createFsId($params);
		$request->setFileId($fsId);
		return $client->FsGetInfo($request)->wait();
	}

	/**
	 * Send FsRead request
	 *
	 * @param CloudPyApiCoreClient $client
	 * @param array $params
	 *
	 * @return \Grpc\ServerStreamingCall
	 */
	public function FsRead($client, $params = []): \Grpc\ServerStreamingCall {
		$request = new FsReadRequest();
		$fsId = $this->createFsId($params);
		$request->setFileId($fsId);
		if (isset($params['offset'])) {
			$request->setOffset($params['offset']);
		}
		if (isset($params['bytesToRead'])) {
			$request->setBytesToRead($params['bytesToRead']);
		}
		return $client->FsRead($request);
	}

	/**
	 * Send FsGetInfo request
	 *
	 * @param CloudPyApiCoreClient $client
	 * @param array $params
	 *
	 * @return \Grpc\ClientStreamingCall
	 */
	public function FsWrite($client): \Grpc\ClientStreamingCall {
		return $client->FsWrite();
	}

	/**
	 * Create FsWriteRequest for writing chunked data
	 *
	 * @param array $params userid and fileid
	 *
	 * @return OCA\NC_GRPC_Example\Proto\FsWriteRequest
	 */
	public function createFsWriteRequest($params = []): FsWriteRequest {
		$request = new FsWriteRequest();
		$fsId = $this->createFsId($params);
		$request->setFileId($fsId);
		$request->setContent($params['content']);
		return $request;
	}

	/**
	 * Send FsCreate request
	 *
	 * @param \OCA\NC_GRPC_Example\Proto\CloudPyApiCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\FsCreateReply,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function FsCreate($client, $params = []): array {
		$request = new FsCreateRequest();
		$fsId = $this->createFsId($params);
		$request->setParentDirId($fsId);
		if (isset($params['isFile'])) {
			$request->setIsFile(boolval($params['isFile']));
		}
		if (isset($params['name'])) {
			$request->setName($params['name']);
		}
		if (isset($params['content'])) {
			$request->setContent($params['content']);
		}
		return $client->FsCreate($request)->wait();
	}

	/**
	 * Send FsDelete request
	 *
	 * @param \OCA\NC_GRPC_Example\Proto\CloudPyApiCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\FsReply,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function FsDelete($client, $params = []): array {
		$request = new FsDeleteRequest();
		$fsId = $this->createFsId($params);
		$request->setFileId($fsId);
		return $client->FsDelete($request)->wait();
	}

	/**
	 * Send FsMove request
	 *
	 * @param \OCA\NC_GRPC_Example\Proto\CloudPyApiCoreClient $client
	 * @param array $params
	 *
	 * @return array [
	 * 	'response' => OCA\NC_GRPC_Example\Proto\FsMoveReply,
	 * 	'status' => ['metadata', 'code', 'details']
	 * ]
	 */
	public function FsMove($client, $params = []): array {
		$request = new FsMoveRequest();
		$fsId = $this->createFsId($params);
		$request->setFileId($fsId);
		if (isset($params['targetPath'])) {
			$request->setTargetPath($params['targetPath']);
		}
		if (isset($params['copy'])) {
			$request->setCopy($params['copy']);
		}
		return $client->FsMove($request)->wait();
	}

	/**
	 * Create fsId for GRPC requests
	 *
	 * @param array $params userid and fileid
	 *
	 * @return OCA\NC_GRPC_Example\Proto\fsId
	 */
	private function createFsId(array $params): fsId {
		$fsId = new fsId();
		if (isset($params['userid'])) {
			$fsId->setUserId($params['userid']);
		}
		if (isset($params['fileid'])) {
			$fsId->setFileId($params['fileid']);
		}
		return $fsId;
	}
}
