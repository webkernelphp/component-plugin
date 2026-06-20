<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Plugins;

use Webkernel\Component\Plugin\Concerns\Plugin\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Plugin\HasLabels;
use Webkernel\Component\Plugin\Concerns\Plugin\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;

/**
 * Plugin with only some defaults for testing mixed scenarios
 */
class MixedDefaultsTestPlugin implements Plugin
{
    use EvaluatesClosures;
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;

    protected function getPluginDefaults(): array
    {
        return [
            // Only provide defaults for some properties
            'pluralModelLabel' => 'Mixed Items',
            'recordTitleAttribute' => 'slug',
            'navigationSort' => 50,
            'shouldRegisterNavigation' => false,
        ];
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): ?static
    {
        return Filament::getPlugin('mixed-defaults-test');
    }

    public function getId(): string
    {
        return 'mixed-defaults-test';
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
