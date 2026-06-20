<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Plugins;

use Webkernel\Component\Plugin\Concerns\Plugin\BelongsToParent;
use Webkernel\Component\Plugin\Concerns\Plugin\BelongsToTenant;
use Webkernel\Component\Plugin\Concerns\Plugin\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Plugin\HasLabels;
use Webkernel\Component\Plugin\Concerns\Plugin\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\FullFeaturesTestUserResource;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;

/**
 * Full-featured plugin for testing all traits together
 */
class FullFeaturesTestPlugin implements Plugin
{
    use BelongsToParent;
    use BelongsToTenant;
    use EvaluatesClosures;
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): ?static
    {
        return Filament::getPlugin('full-features-test');
    }

    public function getId(): string
    {
        return 'full-features-test';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            UserResource::class,
            FullFeaturesTestUserResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    protected function getPluginDefaults(): array
    {
        return [
            'globalSearchResultsLimit' => 25,
        ];
    }
}
