<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: fs.proto

namespace OCA\NC_GRPC_Example\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Reply for FsCreateRequest.
 *
 * Generated from protobuf message <code>NC_GRPC_Example.FsCreateReply</code>
 */
class FsCreateReply extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsResultCode resCode = 1;</code>
     */
    protected $resCode = 0;
    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsId fileId = 2;</code>
     */
    protected $fileId = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $resCode
     *     @type \OCA\NC_GRPC_Example\Proto\fsId $fileId
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Fs::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsResultCode resCode = 1;</code>
     * @return int
     */
    public function getResCode()
    {
        return $this->resCode;
    }

    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsResultCode resCode = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setResCode($var)
    {
        GPBUtil::checkEnum($var, \OCA\NC_GRPC_Example\Proto\fsResultCode::class);
        $this->resCode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsId fileId = 2;</code>
     * @return \OCA\NC_GRPC_Example\Proto\fsId
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsId fileId = 2;</code>
     * @param \OCA\NC_GRPC_Example\Proto\fsId $var
     * @return $this
     */
    public function setFileId($var)
    {
        GPBUtil::checkMessage($var, \OCA\NC_GRPC_Example\Proto\fsId::class);
        $this->fileId = $var;

        return $this;
    }

}

