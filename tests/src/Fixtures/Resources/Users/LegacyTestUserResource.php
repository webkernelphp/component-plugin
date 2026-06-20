<?php

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users;

use Webkernel\Component\Plugin\Concerns\Resource\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Resource\HasLabels;
use Webkernel\Component\Plugin\Concerns\Resource\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\Models\User;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\LegacyStructureTestPlugin;
use Filament\Resources\Resource;

/**
 * UserResource for testing legacy flat structure defaults
 */
class LegacyTestUserResource extends Resource
{
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;

    protected static ?string $model = User::class;

    public static function getEssentialsPlugin(): ?LegacyStructureTestPlugin
    {
        return LegacyStructureTestPlugin::get();
    }
}
