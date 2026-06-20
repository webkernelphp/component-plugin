<?php

use Webkernel\Component\Plugin\PluginEssentialsServiceProvider;
use Workbench\App\Providers\Filament\AdminPanelProvider;
use Workbench\App\Providers\WorkbenchServiceProvider;

return [
    WorkbenchServiceProvider::class,
    AdminPanelProvider::class,
    PluginEssentialsServiceProvider::class,
];
