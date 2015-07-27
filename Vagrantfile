VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

	config.vm.box = "trusty"
	config.vm.box_url = "https://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"

	config.vm.provider "virtualbox" do |v|
		v.customize ["modifyvm", :id, "--memory", "2048"]
		v.customize ["modifyvm", :id, "--cpus", "2"]
	end

	config.vm.network :private_network, ip: "192.168.33.10"

	config.vm.synced_folder "public", "/var/www/dgob", :owner => "www-data", :group => "www-data", :mount_options => [ "dmode=755", "fmode=644" ]

	config.vm.provision :shell, :inline => "apt-get update"
	config.vm.provision :shell, :path => "puppet/init_modules.sh"

	config.vm.provision :puppet do |puppet|
		puppet.manifests_path = "puppet/manifests"
		puppet.module_path = "puppet/modules"
		puppet.manifest_file  = "site.pp"
		puppet.hiera_config_path = "puppet/hiera.yaml"
	end

end