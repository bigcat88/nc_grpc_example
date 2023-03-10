<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: fs.proto

namespace OCA\NC_GRPC_Example\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Reply for this is a FsReply message.
 *
 * Generated from protobuf message <code>NC_GRPC_Example.FsWriteRequest</code>
 */
class FsWriteRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsId fileId = 1;</code>
     */
    protected $fileId = null;
    /**
     * Generated from protobuf field <code>bool last = 2;</code>
     */
    protected $last = false;
    /**
     * Generated from protobuf field <code>bytes content = 3;</code>
     */
    protected $content = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \OCA\NC_GRPC_Example\Proto\fsId $fileId
     *     @type bool $last
     *     @type string $content
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Fs::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsId fileId = 1;</code>
     * @return \OCA\NC_GRPC_Example\Proto\fsId
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsId fileId = 1;</code>
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
     * Generated from protobuf field <code>bool last = 2;</code>
     * @return bool
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * Generated from protobuf field <code>bool last = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setLast($var)
    {
        GPBUtil::checkBool($var);
        $this->last = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes content = 3;</code>
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Generated from protobuf field <code>bytes content = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setContent($var)
    {
        GPBUtil::checkString($var, False);
        $this->content = $var;

        return $this;
    }

}

