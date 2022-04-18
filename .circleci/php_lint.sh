#!/bin/sh

podman run -it --volume ./:/var/www/html php vendor/bin/phpcbf -s --standard=./ruleset.xml ./src ./tests
