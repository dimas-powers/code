#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

if [[ `command -v setfacl` ]]; then
    setfacl -R -m u:"www-data":rwX -m u:`whoami`:rwX /var/www/app/var
    setfacl -dR -m u:"www-data":rwX -m u:`whoami`:rwX /var/www/app/var
else
    echo "setfacl not found"
    chown -R `whoami`:www-data /var/www/app/var && chmod -R 775 /var/www/app/var
fi

# install composer dependencies and migrations
cd /var/www/app && composer install && bin/console doctrine:migrations:migrate

exec "$@"
