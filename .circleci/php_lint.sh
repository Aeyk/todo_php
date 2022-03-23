#!/bin/sh

vendor/bin/phpcs -s --standard=./ruleset.xml ./src ./tests
