<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Plugins;

use Webkernel\Component\Plugin\Concerns\Plugin\BelongsToParent;
use Webkernel\Component\Plugin\Concerns\Plugin\BelongsToTenant;
use Webkernel\Component\Plugin\Concerns\Plugin\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Plugin\HasLabels;
use Webkernel\Component\Plugin\Concerns\Plugin\HasNavigation;
use Webkernel\Component\Plugin\Concerns\Plugin\WithMultipleResourceSupport;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Posts\PostResource;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;

/**
 * Multi-forResource plugin for testing contextual property support
 */
class MultiResourceTestPlugin implements Plugin
{
    use BelongsToParent;
    use BelongsToTenant;
    use EvaluatesClosures;
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;
    use WithMultipleResourceSupport;

    protected function getPluginDefaults(): array
    {
        return [
            'modelLabel' => 'Multi Item',
            'pluralModelLabel' => 'Multi Items',
            'navigationSort' => 20,
            'globalSearchResultsLimit' => 15,
            // Resource-specific defaults
            'resources' => [
                PostResource::class => [
                    'navigationIcon' => 'heroicon-o-document-text',
                ],
            ],
        ];
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): ?static
    {
        return Filament::getPlugin('multi-forResource-test');
    }

    public function getId(): string
    {
        return 'multi-forResource-test';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            UserResource::class,
            PostResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
