<?php

namespace YrPHP\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $manager = $composer->getInstallationManager();
        $manager->addInstaller(new YrPHPFramework($io, $composer));
    }

    public function deactivate(Composer $composer, IOInterface $io){

    }

    public function uninstall(Composer $composer, IOInterface $io)
    {

    }
}