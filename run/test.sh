#!/bin/bash

clear;

node_container_id=$(docker ps -aqf "name=phptestenv")

docker exec -it $node_container_id ./vendor/bin/pest