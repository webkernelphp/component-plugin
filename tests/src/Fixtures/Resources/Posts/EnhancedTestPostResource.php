<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Posts;

use Webkernel\Component\Plugin\Concerns\Resource\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Resource\HasLabels;
use Webkernel\Component\Plugin\Concerns\Resource\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\Models\Post;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\EnhancedDefaultsTestPlugin;
use Filament\Resources\Resource;

/**
 * PostResource for testing enhanced forResource-specific defaults
 */
class EnhancedTestPostResource extends Resource
{
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;

    protected static ?string $model = Post::class;

    public static function getEssentialsPlugin(): ?EnhancedDefaultsTestPlugin
    {
        return EnhancedDefaultsTestPlugin::get();
    }
}
