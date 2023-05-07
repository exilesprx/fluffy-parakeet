#!/bin/bash
docker run -it -v ./:/opt/project -e XDEBUG_SESSION=1 fluffy-parakeet bash