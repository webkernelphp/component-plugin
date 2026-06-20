<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin\Tests\Fixtures\Models;

use Webkernel\Component\Plugin\Tests\Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }
}
