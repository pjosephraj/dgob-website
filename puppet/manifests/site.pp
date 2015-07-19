host { 'dgob.dev':
  ip           => '192.168.33.10',
  host_aliases => [],
}

class { 'apt':
  update     => {
    'frequency' => 'always',
  }
}

class { 'apache':
  default_vhost => false,
  default_mods  => true,
  mpm_module    => 'prefork',
}

include apache::mod::rewrite
include apache::mod::php

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
    'xdebug.remote_port 9000'
  ],
  setenv           => [],
  directories      => [
    {
      path => '/var/www/dgob',
      allow_override => ['All'],
    },
  ],
}

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

class { 'mysql::server':
  override_options => {
    'mysqld' => {
      'bind-address' => '0.0.0.0',
    }
  }
}

create_resources('mysql::db', hiera_hash('databases'))