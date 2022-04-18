#!/bin/sh

#!/bin/sh
if test -n "$CI" ; then
		vendor/bin/phpunit tests
else
		podman run -it --volume ./:/var/www/html php \
					 		vendor/bin/phpunit tests
fi
