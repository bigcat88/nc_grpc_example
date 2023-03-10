<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: fs.proto

namespace OCA\NC_GRPC_Example\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>NC_GRPC_Example.FsReadReply</code>
 */
class FsReadReply extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.NC_GRPC_Example.fsResultCode resCode = 1;</code>
     */
    protected $resCode = 0;
    /**
     * Generated from protobuf field <code>bool last = 2;</code>
     */
    protected $last = false;
    /**
     * Present only if resCode is NO_ERROR.
     *
     * Generated from protobuf field <code>bytes content = 3;</code>
     */
    protected $content = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $resCode
     *     @type bool $last
     *     @type string $content
     *           Present only if resCode is NO_ERROR.
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
     * Present only if resCode is NO_ERROR.
     *
     * Generated from protobuf field <code>bytes content = 3;</code>
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Present only if resCode is NO_ERROR.
     *
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

