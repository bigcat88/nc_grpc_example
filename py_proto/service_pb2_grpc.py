# Generated by the gRPC Python protocol compiler plugin. DO NOT EDIT!
"""Client and server classes corresponding to protobuf-defined services."""
import grpc

import core_pb2 as core__pb2
import fs_pb2 as fs__pb2


class CloudPyApiCoreStub(object):
    """Missing associated documentation comment in .proto file."""

    def __init__(self, channel):
        """Constructor.

        Args:
            channel: A grpc.Channel.
        """
        self.TaskExit = channel.unary_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/TaskExit',
                request_serializer=core__pb2.TaskExitRequest.SerializeToString,
                response_deserializer=core__pb2.Empty.FromString,
                )
        self.TaskLog = channel.unary_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/TaskLog',
                request_serializer=core__pb2.TaskLogRequest.SerializeToString,
                response_deserializer=core__pb2.Empty.FromString,
                )
        self.FsGetInfo = channel.unary_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsGetInfo',
                request_serializer=fs__pb2.FsGetInfoRequest.SerializeToString,
                response_deserializer=fs__pb2.FsListReply.FromString,
                )
        self.FsList = channel.unary_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsList',
                request_serializer=fs__pb2.FsListRequest.SerializeToString,
                response_deserializer=fs__pb2.FsListReply.FromString,
                )
        self.FsRead = channel.unary_stream(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsRead',
                request_serializer=fs__pb2.FsReadRequest.SerializeToString,
                response_deserializer=fs__pb2.FsReadReply.FromString,
                )
        self.FsCreate = channel.unary_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsCreate',
                request_serializer=fs__pb2.FsCreateRequest.SerializeToString,
                response_deserializer=fs__pb2.FsCreateReply.FromString,
                )
        self.FsWrite = channel.stream_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsWrite',
                request_serializer=fs__pb2.FsWriteRequest.SerializeToString,
                response_deserializer=fs__pb2.FsReply.FromString,
                )
        self.FsDelete = channel.unary_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsDelete',
                request_serializer=fs__pb2.FsDeleteRequest.SerializeToString,
                response_deserializer=fs__pb2.FsReply.FromString,
                )
        self.FsMove = channel.unary_unary(
                '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsMove',
                request_serializer=fs__pb2.FsMoveRequest.SerializeToString,
                response_deserializer=fs__pb2.FsMoveReply.FromString,
                )


class CloudPyApiCoreServicer(object):
    """Missing associated documentation comment in .proto file."""

    def TaskExit(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def TaskLog(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def FsGetInfo(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def FsList(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def FsRead(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def FsCreate(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def FsWrite(self, request_iterator, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def FsDelete(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def FsMove(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')


def add_CloudPyApiCoreServicer_to_server(servicer, server):
    rpc_method_handlers = {
            'TaskExit': grpc.unary_unary_rpc_method_handler(
                    servicer.TaskExit,
                    request_deserializer=core__pb2.TaskExitRequest.FromString,
                    response_serializer=core__pb2.Empty.SerializeToString,
            ),
            'TaskLog': grpc.unary_unary_rpc_method_handler(
                    servicer.TaskLog,
                    request_deserializer=core__pb2.TaskLogRequest.FromString,
                    response_serializer=core__pb2.Empty.SerializeToString,
            ),
            'FsGetInfo': grpc.unary_unary_rpc_method_handler(
                    servicer.FsGetInfo,
                    request_deserializer=fs__pb2.FsGetInfoRequest.FromString,
                    response_serializer=fs__pb2.FsListReply.SerializeToString,
            ),
            'FsList': grpc.unary_unary_rpc_method_handler(
                    servicer.FsList,
                    request_deserializer=fs__pb2.FsListRequest.FromString,
                    response_serializer=fs__pb2.FsListReply.SerializeToString,
            ),
            'FsRead': grpc.unary_stream_rpc_method_handler(
                    servicer.FsRead,
                    request_deserializer=fs__pb2.FsReadRequest.FromString,
                    response_serializer=fs__pb2.FsReadReply.SerializeToString,
            ),
            'FsCreate': grpc.unary_unary_rpc_method_handler(
                    servicer.FsCreate,
                    request_deserializer=fs__pb2.FsCreateRequest.FromString,
                    response_serializer=fs__pb2.FsCreateReply.SerializeToString,
            ),
            'FsWrite': grpc.stream_unary_rpc_method_handler(
                    servicer.FsWrite,
                    request_deserializer=fs__pb2.FsWriteRequest.FromString,
                    response_serializer=fs__pb2.FsReply.SerializeToString,
            ),
            'FsDelete': grpc.unary_unary_rpc_method_handler(
                    servicer.FsDelete,
                    request_deserializer=fs__pb2.FsDeleteRequest.FromString,
                    response_serializer=fs__pb2.FsReply.SerializeToString,
            ),
            'FsMove': grpc.unary_unary_rpc_method_handler(
                    servicer.FsMove,
                    request_deserializer=fs__pb2.FsMoveRequest.FromString,
                    response_serializer=fs__pb2.FsMoveReply.SerializeToString,
            ),
    }
    generic_handler = grpc.method_handlers_generic_handler(
            'OCA.Cloud_Py_API.Proto.CloudPyApiCore', rpc_method_handlers)
    server.add_generic_rpc_handlers((generic_handler,))


 # This class is part of an EXPERIMENTAL API.
class CloudPyApiCore(object):
    """Missing associated documentation comment in .proto file."""

    @staticmethod
    def TaskExit(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/TaskExit',
            core__pb2.TaskExitRequest.SerializeToString,
            core__pb2.Empty.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def TaskLog(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/TaskLog',
            core__pb2.TaskLogRequest.SerializeToString,
            core__pb2.Empty.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def FsGetInfo(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsGetInfo',
            fs__pb2.FsGetInfoRequest.SerializeToString,
            fs__pb2.FsListReply.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def FsList(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsList',
            fs__pb2.FsListRequest.SerializeToString,
            fs__pb2.FsListReply.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def FsRead(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_stream(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsRead',
            fs__pb2.FsReadRequest.SerializeToString,
            fs__pb2.FsReadReply.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def FsCreate(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsCreate',
            fs__pb2.FsCreateRequest.SerializeToString,
            fs__pb2.FsCreateReply.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def FsWrite(request_iterator,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.stream_unary(request_iterator, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsWrite',
            fs__pb2.FsWriteRequest.SerializeToString,
            fs__pb2.FsReply.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def FsDelete(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsDelete',
            fs__pb2.FsDeleteRequest.SerializeToString,
            fs__pb2.FsReply.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)

    @staticmethod
    def FsMove(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(request, target, '/OCA.Cloud_Py_API.Proto.CloudPyApiCore/FsMove',
            fs__pb2.FsMoveRequest.SerializeToString,
            fs__pb2.FsMoveReply.FromString,
            options, channel_credentials,
            insecure, call_credentials, compression, wait_for_ready, timeout, metadata)
