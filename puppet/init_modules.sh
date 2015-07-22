#!/bin/bash

test -d /etc/puppet/modules/locales     || puppet module install saz-locales
test -d /etc/puppet/modules/apt         || puppet module install puppetlabs-apt
test -d /etc/puppet/modules/apache      || puppet module install puppetlabs-apache
test -d /etc/puppet/modules/php         || puppet module install example42-php
test -d /etc/puppet/modules/augeas      || puppet module install camptocamp-augeas
test -d /etc/puppet/modules/mysql       || puppet module install puppetlabs-mysql
# The Mailcatcher module does not properly define its dependencies,
# so we need to install them manually.
test -d /etc/puppet/modules/mailcatcher || (apt-get install -y build-essential g++ && puppet module install actionjack-mailcatcher)