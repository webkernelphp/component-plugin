<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Enhanced;

use Webkernel\Component\Plugin\Concerns\Resource\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Resource\HasLabels;
use Webkernel\Component\Plugin\Concerns\Resource\HasNavigation;
use Webkernel\Component\Plugin\Resource\DelegatesToPlugin;
use Webkernel\Component\Plugin\Tests\Fixtures\Models\Post;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\EnhancedMultiResourceTestPlugin;
use Filament\Resources\Resource;

class EnhancedPostResource extends Resource
{
    use DelegatesToPlugin;
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;

    protected static ?string $model = Post::class;

    public static function getEssentialsPlugin(): ?EnhancedMultiResourceTestPlugin
    {
        return EnhancedMultiResourceTestPlugin::get();
    }
}
