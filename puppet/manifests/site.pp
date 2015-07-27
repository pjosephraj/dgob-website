class { 'locales':
  locales   => ['de_DE.UTF-8'],
}

host { 'dgob.dev':
  ip           => '192.168.33.10',
  host_aliases => ['db.dev', 'mail.dev', 'webgrind.dev'],
}

class { 'apt':
  update     => {
    'frequency' => 'always',
  }
}


#####################
# Webgrind          #
#####################
class { 'webgrind': }

file { '/var/www/webgrind':
  ensure => 'link',
  target => '/usr/share/php/webgrind/source',
}


#####################
# Apache            #
#####################
class { 'apache':
  default_vhost => false,
  default_mods  => true,
  mpm_module    => 'prefork',
}

include apache::mod::rewrite
include apache::mod::php


#####################
# vHosts            #
#####################
apache::vhost { 'dgob.dev':
  default_vhost    => true,
  servername       => 'dgob.dev',
  port             => '80',
  docroot          => '/var/www/dgob',
  php_admin_values => [
    'date.timezone Europe/Berlin',
    'max_execution_time 240',
    'post_max_size 10M',
    'upload_max_filesize 10M',
    'xdebug.max_nesting_level 400',
    'xdebug.remote_enable 1',
    'xdebug.remote_connect_back 1',
    'xdebug.remote_port 9000',
    'xdebug.profiler_enable_trigger 1',
    'xdebug.profiler_output_dir /tmp',
    'sendmail_path "/usr/bin/env catchmail -f mail@dgob.dev"',
  ],
  setenv           => [],
  directories      => [
    {
      path => '/var/www/dgob',
      allow_override => ['All'],
    },
  ],
}

apache::vhost { 'db.dev':
  servername    => 'db.dev',
  port          => '80',
  docroot       => '/var/www/adminer',
}

apache::vhost { 'mail.dev':
  servername => 'mail.dev',
  port       => 80,
  docroot    => '/var/www',
  proxy_pass => [{
    'path' => '/',
    'url' => 'http://localhost:1080/'
  }],
}

apache::vhost { 'webgrind.dev':
  servername    => 'webgrind.dev',
  port          => '80',
  docroot       => '/var/www/webgrind',
}


#####################
# PHP               #
#####################
php::module { 'xdebug': }
php::module { 'mysql': }
php::module { 'gd': }
php::module { 'cli': }

php::augeas {
  'php-memorylimit':
    entry  => 'PHP/memory_limit',
    value  => '256M';
  'php-date_timezone':
    entry  => 'Date/date.timezone',
    value  => 'Europe/Berlin';
  'php-cli-memorylimit':
    target => '/etc/php5/cli/php.ini',
    entry  => 'PHP/memory_limit',
    value  => '256M';
  'php-cli-date_timezone':
    target => '/etc/php5/cli/php.ini',
    entry  => 'Date/date.timezone',
    value  => 'Europe/Berlin';
}


#####################
# MySQL             #
#####################
class { 'mysql::server': }

create_resources('mysql::db', hiera_hash('databases'))


#####################
# Adminer           #
#####################
file { '/var/www/adminer':
  ensure => directory,
  mode   => 755,
  owner  => 'www-data',
  group  => 'www-data',
}

exec { 'Download Adminer':
  command => '/usr/bin/wget http://www.adminer.org/latest.php -O /var/www/adminer/index.php',
  require => File['/var/www/adminer'],
  creates => '/var/www/adminer/index.php',
}


#####################
# Mailcatcher       #
#####################
class { 'mailcatcher': }