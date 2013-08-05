# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.provision :shell, :path => "vagrantup.sh"

  config.vm.provision :puppet do |puppet|
      puppet.manifests_path = "puppet/manifests"
      puppet.manifest_file  = "site.pp"
  end

  # Allow local machines to view the VM
  config.vm.network :forwarded_port, host: 4567, guest: 80
  config.vm.network :public_network

  config.vm.provider :virtualbox do |vb|
    config.vm.box = "precise64"
    config.vm.box_url = "http://files.vagrantup.com/precise64.box"
    # This allows symlinks to be created within the /vagrant root directory, 
    # which is something librarian-puppet needs to be able to do. This might
    # be enabled by default depending on what version of VirtualBox is used.
    vb.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
    # don't boot with headless mode
    vb.gui = false
  end

  config.vm.provider :vmware_fusion do |vmware, override|
    override.vm.box = "precise64_vmware"
    override.vm.box_url = "http://files.vagrantup.com/precise64_vmware.box"
    vmware.vmx["displayName"] = "namaste2"
  end 
end
