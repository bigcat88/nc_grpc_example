<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: fs.proto

namespace OCA\NC_GRPC_Example\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>OCA.NC_GRPC_Example.Proto.FsGetInfoRequest</code>
 */
class FsGetInfoRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.OCA.NC_GRPC_Example.Proto.fsId fileId = 1;</code>
     */
    protected $fileId = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \OCA\NC_GRPC_Example\Proto\fsId $fileId
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Fs::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.OCA.NC_GRPC_Example.Proto.fsId fileId = 1;</code>
     * @return \OCA\NC_GRPC_Example\Proto\fsId
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Generated from protobuf field <code>.OCA.NC_GRPC_Example.Proto.fsId fileId = 1;</code>
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

