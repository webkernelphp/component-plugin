<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users;

use Webkernel\Component\Plugin\Concerns\Resource\BelongsToParent;
use Webkernel\Component\Plugin\Concerns\Resource\BelongsToTenant;
use Webkernel\Component\Plugin\Concerns\Resource\HasGlobalSearch;
use Webkernel\Component\Plugin\Concerns\Resource\HasLabels;
use Webkernel\Component\Plugin\Concerns\Resource\HasNavigation;
use Webkernel\Component\Plugin\Tests\Fixtures\EssentialPlugin;
use Webkernel\Component\Plugin\Tests\Fixtures\Models\User;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Pages\CreateUser;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Pages\EditUser;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Pages\ListUsers;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Pages\ViewUser;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Schemas\UserForm;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Schemas\UserInfolist;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Tables\UsersTable;
use Filament\Contracts\Plugin;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class UserResource extends Resource
{
    use BelongsToParent;
    use BelongsToTenant;
    use HasGlobalSearch;
    use HasLabels;
    use HasNavigation;

    protected static ?string $model = User::class;

    public static function getEssentialsPlugin(): Plugin
    {
        return EssentialPlugin::get();
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
