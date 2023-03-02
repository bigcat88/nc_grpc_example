#!/bin/sh

#Build core proto commands for php. Run from root of project.

$SCRIPT_DIR=$(dirname "$0")
cd "$SCRIPT_DIR" || exit
cd .. || exit

#sudo mkdir -p lib/Proto && \
#sudo protoc --proto_path=proto --php_out=lib/Proto \
#proto/service.proto proto/core.proto proto/fs.proto \
#--grpc_out=generate_server:lib/Proto \
#--plugin=protoc-gen-grpc=/home/andrey/grpc/cmake/build/grpc_php_plugin && \
#sudo mv lib/Proto/OCA/NC_GRPC_Example/Proto/* lib/Proto && \
#sudo rm -rf lib/Proto/OCA && \
#sudo chown -R andrey:www-data lib/Proto

# Remove old compiled files
sudo rm -rf ./lib/Proto
sudo mkdir -p ./lib/Proto
# Compile the proto files 
sudo protoc --proto_path=proto --php_out=lib/Proto ./proto/core.proto proto/fs.proto ./proto/service.proto \
--grpc_out=generate_server:lib/Proto \
# using compiled grpc_php_plugin from grpc repo
--plugin=protoc-gen-grpc=/home/andrey/grpc/cmake/build/grpc_php_plugin
# Move the compiled files to the correct location for autoload
sudo mv ./lib/Proto/OCA/NC_GRPC_Example/Proto/* ./lib/Proto
# Remove the old directory
sudo rm -rf ./lib/Proto/OCA
# Set the correct permissions for webserver
sudo chown -R www-data:www-data ./lib/Proto
