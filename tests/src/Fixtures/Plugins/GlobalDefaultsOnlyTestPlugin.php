<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Plugins;

use Webkernel\Component\Plugin\Concerns\Plugin\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Plugin\HasLabels;
use Webkernel\Component\Plugin\Concerns\Plugin\HasNavigation;
use Webkernel\Component\Plugin\Concerns\Plugin\WithMultipleResourceSupport;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;

/**
 * Plugin for testing fallback to global defaults (no forResource-specific defaults)
 */
class GlobalDefaultsOnlyTestPlugin implements Plugin
{
    use EvaluatesClosures;
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;
    use WithMultipleResourceSupport;

    protected function getPluginDefaults(): array
    {
        return [
            // Only global defaults, no 'resources' key
            'modelLabel' => 'Global Only',
            'pluralModelLabel' => 'Global Only Items',
            'navigationSort' => 99,
            'globalSearchResultsLimit' => 50,
            'navigationGroup' => 'Global Plugin',
        ];
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): ?static
    {
        return Filament::getPlugin('global-defaults-only-test');
    }

    public function getId(): string
    {
        return 'global-defaults-only-test';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
