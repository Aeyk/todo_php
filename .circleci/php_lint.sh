#!/bin/sh
if [[ -z "$CI" ]]; then
		vendor/bin/phpcs -s --standard=./ruleset.xml ./src ./tests
else
		podman run -it --volume ./:/var/www/html php \
					 vendor/bin/phpcs -s --standard=./ruleset.xml ./src ./tests
fi
