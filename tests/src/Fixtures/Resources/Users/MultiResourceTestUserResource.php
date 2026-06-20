<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users;

use Webkernel\Component\Plugin\Tests\Fixtures\EssentialPlugin;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\MultiResourceTestPlugin;

/**
 * UserResource that connects to MultiResourceTestPlugin for enhanced defaults testing
 */
class MultiResourceTestUserResource extends UserResource
{
    public static function getEssentialsPlugin(): ?EssentialPlugin
    {
        return MultiResourceTestPlugin::get();
    }
}
