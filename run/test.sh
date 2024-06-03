#!/bin/bash

clear;

phptestenv_container_id=$(docker ps -aqf "name=phptestenv")

docker exec -it $phptestenv_container_id ./vendor/bin/pest