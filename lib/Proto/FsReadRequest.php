<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: fs.proto

namespace OCA\NC_GRPC_Example\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>OCA.NC_GRPC_Example.Proto.FsReadRequest</code>
 */
class FsReadRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.OCA.NC_GRPC_Example.Proto.fsId fileId = 1;</code>
     */
    protected $fileId = null;
    /**
     * Generated from protobuf field <code>int64 offset = 2;</code>
     */
    protected $offset = 0;
    /**
     * Generated from protobuf field <code>int64 bytes_to_read = 3;</code>
     */
    protected $bytes_to_read = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \OCA\NC_GRPC_Example\Proto\fsId $fileId
     *     @type int|string $offset
     *     @type int|string $bytes_to_read
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

    /**
     * Generated from protobuf field <code>int64 offset = 2;</code>
     * @return int|string
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Generated from protobuf field <code>int64 offset = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setOffset($var)
    {
        GPBUtil::checkInt64($var);
        $this->offset = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 bytes_to_read = 3;</code>
     * @return int|string
     */
    public function getBytesToRead()
    {
        return $this->bytes_to_read;
    }

    /**
     * Generated from protobuf field <code>int64 bytes_to_read = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setBytesToRead($var)
    {
        GPBUtil::checkInt64($var);
        $this->bytes_to_read = $var;

        return $this;
    }

}
