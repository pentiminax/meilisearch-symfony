<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Factory\PostFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Meilisearch\Bundle\SearchService;

class PostFixtures extends Fixture
{
    public function __construct(
        private readonly SearchService $searchService
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $this->searchService->clear(Post::class);

        PostFactory::createMany(1000);
    }
}
