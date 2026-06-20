<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\Pages;

use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
