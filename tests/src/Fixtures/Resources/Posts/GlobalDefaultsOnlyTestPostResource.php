<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Posts;

use Webkernel\Component\Plugin\Concerns\Resource\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Resource\HasLabels;
use Webkernel\Component\Plugin\Concerns\Resource\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\Models\Post;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\GlobalDefaultsOnlyTestPlugin;
use Filament\Resources\Resource;

/**
 * PostResource for testing global defaults only (no forResource-specific defaults)
 */
class GlobalDefaultsOnlyTestPostResource extends Resource
{
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;

    protected static ?string $model = Post::class;

    public static function getEssentialsPlugin(): ?GlobalDefaultsOnlyTestPlugin
    {
        return GlobalDefaultsOnlyTestPlugin::get();
    }
}
