<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin\Tests\Database\Factories;

use Webkernel\Component\Plugin\Tests\Fixtures\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'tenant_id' => null, // Assuming tenant_id is nullable
        ];
    }
}
