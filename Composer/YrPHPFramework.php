<?php

namespace YrPHP\Composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class YrPHPFramework extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        if ('kwin/yrphp-core' !== $package->getPrettyName()) {
            throw new \InvalidArgumentException('Unable to install this library!');
        }
        if ($this->composer->getPackage()->getType() !== 'project') {
            return parent::getInstallPath($package);
        }
        if ($this->composer->getPackage()) {
            $extra = $this->composer->getPackage()->getExtra();
            if (!empty($extra['yrphp-path'])) {
                return $extra['yrphp-path'];
            }
        }
        return 'YrPHP';
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'yrphp-framework' === $packageType;
    }
}