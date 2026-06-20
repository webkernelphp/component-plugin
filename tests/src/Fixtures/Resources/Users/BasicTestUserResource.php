<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users;

use BackedEnum;
use Webkernel\Component\Plugin\Concerns\Resource\HasLabels;
use Webkernel\Component\Plugin\Tests\Fixtures\Models\User;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\BasicTestPlugin;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BasicTestUserResource extends Resource
{
    use HasLabels;

    protected static ?string $model = User::class;

    protected static BackedEnum | string | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getEssentialsPlugin(): ?BasicTestPlugin
    {
        return BasicTestPlugin::get();
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
