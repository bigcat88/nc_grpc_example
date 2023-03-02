<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: core.proto

namespace OCA\NC_GRPC_Example\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * No reply. Server must close pipe/socket after this message.
 *
 * Generated from protobuf message <code>OCA.NC_GRPC_Example.Proto.TaskExitRequest</code>
 */
class TaskExitRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Result of task, if any.
     *
     * Generated from protobuf field <code>string result = 1;</code>
     */
    protected $result = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $result
     *           Result of task, if any.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Core::initOnce();
        parent::__construct($data);
    }

    /**
     * Result of task, if any.
     *
     * Generated from protobuf field <code>string result = 1;</code>
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Result of task, if any.
     *
     * Generated from protobuf field <code>string result = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setResult($var)
    {
        GPBUtil::checkString($var, True);
        $this->result = $var;

        return $this;
    }

}

