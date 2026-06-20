<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PluginEssentialsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-plugin-essentials');
    }
}
