<?php
// GENERATED CODE -- DO NOT EDIT!

namespace OCA\NC_GRPC_Example\Proto;

/**
 */
class NCGRPCExampleCoreStub {

    /**
     * @param \OCA\NC_GRPC_Example\Proto\PBEmpty $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \OCA\NC_GRPC_Example\Proto\PBEmpty for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function TaskInit(
        \OCA\NC_GRPC_Example\Proto\PBEmpty $request,
        \Grpc\ServerContext $context
    ): ?\OCA\NC_GRPC_Example\Proto\PBEmpty {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
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
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
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
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
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
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
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
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
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
        $context->setStatus(\Grpc\Status::unimplemented());
        $writer->finish();
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsCreateRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \OCA\NC_GRPC_Example\Proto\FsCreateReply for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function FsCreate(
        \OCA\NC_GRPC_Example\Proto\FsCreateRequest $request,
        \Grpc\ServerContext $context
    ): ?\OCA\NC_GRPC_Example\Proto\FsCreateReply {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
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
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
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
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * @param \OCA\NC_GRPC_Example\Proto\FsMoveRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \OCA\NC_GRPC_Example\Proto\FsMoveReply for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function FsMove(
        \OCA\NC_GRPC_Example\Proto\FsMoveRequest $request,
        \Grpc\ServerContext $context
    ): ?\OCA\NC_GRPC_Example\Proto\FsMoveReply {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * Get the method descriptors of the service for server registration
     *
     * @return array of \Grpc\MethodDescriptor for the service methods
     */
    public final function getMethodDescriptors(): array
    {
        return [
            '/NC_GRPC_Example.NCGRPCExampleCore/TaskInit' => new \Grpc\MethodDescriptor(
                $this,
                'TaskInit',
                '\OCA\NC_GRPC_Example\Proto\PBEmpty',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/TaskExit' => new \Grpc\MethodDescriptor(
                $this,
                'TaskExit',
                '\OCA\NC_GRPC_Example\Proto\TaskExitRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/TaskLog' => new \Grpc\MethodDescriptor(
                $this,
                'TaskLog',
                '\OCA\NC_GRPC_Example\Proto\TaskLogRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/FsGetInfo' => new \Grpc\MethodDescriptor(
                $this,
                'FsGetInfo',
                '\OCA\NC_GRPC_Example\Proto\FsGetInfoRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/FsList' => new \Grpc\MethodDescriptor(
                $this,
                'FsList',
                '\OCA\NC_GRPC_Example\Proto\FsListRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/FsRead' => new \Grpc\MethodDescriptor(
                $this,
                'FsRead',
                '\OCA\NC_GRPC_Example\Proto\FsReadRequest',
                \Grpc\MethodDescriptor::SERVER_STREAMING_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/FsCreate' => new \Grpc\MethodDescriptor(
                $this,
                'FsCreate',
                '\OCA\NC_GRPC_Example\Proto\FsCreateRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/FsWrite' => new \Grpc\MethodDescriptor(
                $this,
                'FsWrite',
                '\OCA\NC_GRPC_Example\Proto\FsWriteRequest',
                \Grpc\MethodDescriptor::CLIENT_STREAMING_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/FsDelete' => new \Grpc\MethodDescriptor(
                $this,
                'FsDelete',
                '\OCA\NC_GRPC_Example\Proto\FsDeleteRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/NC_GRPC_Example.NCGRPCExampleCore/FsMove' => new \Grpc\MethodDescriptor(
                $this,
                'FsMove',
                '\OCA\NC_GRPC_Example\Proto\FsMoveRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
        ];
    }

}
