<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: fs.proto

namespace OCA\NC_GRPC_Example\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Reply for this is a FsMoveReply message.
 *
 * Generated from protobuf message <code>OCA.NC_GRPC_Example.Proto.FsMoveRequest</code>
 */
class FsMoveRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.OCA.NC_GRPC_Example.Proto.fsId fileId = 1;</code>
     */
    protected $fileId = null;
    /**
     * Absolute path relative to MountPoint.
     *
     * Generated from protobuf field <code>string targetPath = 2;</code>
     */
    protected $targetPath = '';
    /**
     * Generated from protobuf field <code>bool copy = 3;</code>
     */
    protected $copy = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \OCA\NC_GRPC_Example\Proto\fsId $fileId
     *     @type string $targetPath
     *           Absolute path relative to MountPoint.
     *     @type bool $copy
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
     * Absolute path relative to MountPoint.
     *
     * Generated from protobuf field <code>string targetPath = 2;</code>
     * @return string
     */
    public function getTargetPath()
    {
        return $this->targetPath;
    }

    /**
     * Absolute path relative to MountPoint.
     *
     * Generated from protobuf field <code>string targetPath = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setTargetPath($var)
    {
        GPBUtil::checkString($var, True);
        $this->targetPath = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool copy = 3;</code>
     * @return bool
     */
    public function getCopy()
    {
        return $this->copy;
    }

    /**
     * Generated from protobuf field <code>bool copy = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setCopy($var)
    {
        GPBUtil::checkBool($var);
        $this->copy = $var;

        return $this;
    }

}

