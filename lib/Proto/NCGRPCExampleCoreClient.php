<?php
// GENERATED CODE -- DO NOT EDIT!

namespace OCA\NC_GRPC_Example\Proto;

/**
 */
class NCGRPCExampleCoreClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TaskInit(\OCA\NC_GRPC_Example\Proto\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/TaskInit',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\TaskExitRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TaskExit(\OCA\NC_GRPC_Example\Proto\TaskExitRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/TaskExit',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\TaskLogRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TaskLog(\OCA\NC_GRPC_Example\Proto\TaskLogRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/TaskLog',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsGetInfoRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FsGetInfo(\OCA\NC_GRPC_Example\Proto\FsGetInfoRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/FsGetInfo',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\FsListReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsListRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FsList(\OCA\NC_GRPC_Example\Proto\FsListRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/FsList',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\FsListReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsReadRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function FsRead(\OCA\NC_GRPC_Example\Proto\FsReadRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/NC_GRPC_Example.NCGRPCExampleCore/FsRead',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\FsReadReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsCreateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FsCreate(\OCA\NC_GRPC_Example\Proto\FsCreateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/FsCreate',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\FsCreateReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ClientStreamingCall
     */
    public function FsWrite($metadata = [], $options = []) {
        return $this->_clientStreamRequest('/NC_GRPC_Example.NCGRPCExampleCore/FsWrite',
        ['\OCA\NC_GRPC_Example\Proto\FsReply','decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsDeleteRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FsDelete(\OCA\NC_GRPC_Example\Proto\FsDeleteRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/FsDelete',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\FsReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsMoveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FsMove(\OCA\NC_GRPC_Example\Proto\FsMoveRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NC_GRPC_Example.NCGRPCExampleCore/FsMove',
        $argument,
        ['\OCA\NC_GRPC_Example\Proto\FsMoveReply', 'decode'],
        $metadata, $options);
    }

}
