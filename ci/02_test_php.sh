#!/usr/bin/env sh
set +x

pushd .

cd ..
./vendor/bin/phpunit tests

popd
