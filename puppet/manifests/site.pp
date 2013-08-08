Exec {
  path => "/bin:/usr/sbin:/usr/bin",
}
group {"zephod":
  ensure => present,
}
file {"/home/zephod":
  require => [ User["zephod"], Group["zephod"] ],
  ensure  => directory,
  owner   => "zephod",
  group   => "zephod",
}
user { "zephod":
  require    => Group["zephod"],
  ensure     => present,
  managehome => true,
  gid        => "zephod",
  shell      => "/bin/bash",
  home       => "/home/zephod",
  groups     => ["sudo","adm","admin"],
}

class {  'apache':
  default_vhost => false,
  mpm_module    => 'prefork',
  servername    => 'localhost'
}
apache::vhost { 'localhost':
  port          => '80',
  docroot       => '/var/wordpress',
  override      => 'All',
  docroot_owner => 'www-data',
  docroot_group => 'www-data',
}
class { 'apache::mod::php': }
class { 'apache::mod::rewrite': }


class { 'mysql::server':
  config_hash => { 'root_password' => 'rootpass' }
}
class { 'mysql::php': }
mysql::db { 'wp_forrest':
  user     => 'forrest',
  password => 'pass',
  host     => 'localhost',
  grant    => ['all'],
}


exec { 'unzip_wordpress':
  command => 'tar -vxzf /vagrant/wordpress-3.6.tar.gz -C /var && chown -R www-data /var/wordpress',
  unless  => 'test -d /var/wordpress',
}
file {'/var/wordpress/wp-config.php':
  ensure => link,
  target => '/vagrant/wp-config.php',
  require => Exec['unzip_wordpress'],
}
file {'/var/wordpress/wp-content/themes/theme':
  ensure  => link,
  target  => '/vagrant/theme',
  require => Exec['unzip_wordpress'],
}
  
