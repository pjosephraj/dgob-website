#!/usr/bin/env bash

SCRIPT_ROOT="$(cd "$(dirname "$0")" && pwd)"
PROJECT_ROOT="$(cd "$(dirname "$SCRIPT_ROOT")" && pwd)"
CODE_ROOT="${PROJECT_ROOT}/public"
export PHPCS="${SCRIPT_ROOT}/phpcs.phar"
WPCS="${SCRIPT_ROOT}/wpcs"

if [ ! -e "$PHPCS" ]; then
	curl -L "https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar" >"$PHPCS"
fi

if [ ! -d "$WPCS" ]; then
	git clone -b master "https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards.git" "$WPCS"
fi

php "$PHPCS" --config-set installed_paths "$WPCS"

wp_validate () {
	php -lf "$0"
	php "$PHPCS" --standard=WordPress-Core "$0"
}

export -f wp_validate

find "$CODE_ROOT" \
	-iname "*.php" \
	| grep -v "public/wp/" \
	| grep -v "plugins/bootstrap-3-shortcodes" \
	| grep -v "plugins/go-baduk-weiqi" \
	| grep -v "plugins/wp-password-policy-manager" \
	| grep -v "plugins/wp-super-cache" \
	| grep -v "plugins/contact-form-7" \
	| grep -v "themes/twenty" \
	| grep -v "vendor" \
	| grep -v "advanced-cache.php" \
	| grep -v "wp-cache-config" \
	| xargs -I % bash -c 'wp_validate "$@"' %