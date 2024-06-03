#!/bin/bash

phptestenv_container_id=$(docker ps -aqf "name=phptestenv")

docker exec -it $phptestenv_container_id /bin/sh