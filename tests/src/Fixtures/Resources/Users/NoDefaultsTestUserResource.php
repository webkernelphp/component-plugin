<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users;

use Webkernel\Component\Plugin\Concerns\Resource\HasLabels;
use Webkernel\Component\Plugin\Concerns\Resource\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\Models\User;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\NoDefaultsTestPlugin;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NoDefaultsTestUserResource extends Resource
{
    use HasLabels;
    use HasNavigation;

    protected static ?string $model = User::class;

    protected static string | null | \BackedEnum $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEssentialsPlugin(): ?NoDefaultsTestPlugin
    {
        return NoDefaultsTestPlugin::get();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [];
    }
}
