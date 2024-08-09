<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Meilisearch\Bundle\SearchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly SearchService $searchService
    ) {
    }

    #[Route('/search', name: 'search.index')]
    public function index(#[MapQueryParameter] string $query): Response
    {
        $posts = $this->searchService->search($this->em, Post::class, $query, [
            'limit' => 1000,
        ]);

        return $this->render('search/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
