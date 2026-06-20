<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Plugins;

use Webkernel\Component\Plugin\Concerns\Plugin\HasLabels;
use Webkernel\Component\Plugin\Concerns\Plugin\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;

/**
 * Plugin without defaults for testing forResource fallback
 */
class NoDefaultsTestPlugin implements Plugin
{
    use EvaluatesClosures;
    use HasLabels;
    use HasNavigation;

    // No getPluginDefaults() method - should fall back to forResource defaults

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): ?static
    {
        return Filament::getPlugin('no-defaults-test');
    }

    public function getId(): string
    {
        return 'no-defaults-test';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            UserResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
