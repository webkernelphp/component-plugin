<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Posts;

use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\MultiResourceTestPlugin;

/**
 * PostResource that connects to MultiResourceTestPlugin for enhanced defaults testing
 */
class MultiResourceTestPostResource extends PostResource
{
    public static function getEssentialsPlugin(): ?MultiResourceTestPlugin
    {
        return MultiResourceTestPlugin::get();
    }
}
