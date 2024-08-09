<?php

namespace App\Factory;

use App\Entity\Post;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Post>
 */
final class PostFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Post::class;
    }

    protected function defaults(): array
    {
        return [
            'published' => self::faker()->boolean(),
            'title' => self::faker()->text(50),
            'content' => self::faker()->text(),
        ];
    }

    protected function initialize(): static
    {
        return $this;
    }
}
