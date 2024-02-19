<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro-posts', name: 'app_micro_post')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();
        // $posts = $postRepository->findByCreatedAt(['createdAt' => 'DESC']);
        // dd($posts);
        
        return $this->render('micro_post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/micro-posts/{id}', name: 'app_micro_post_show')]
    public function show(PostRepository $postRepository, $id): Response
    {
        $post = $postRepository->findById($id);
        dd($post);
        
        return $this->render('micro_post/index.html.twig', [
            'controller_name' => 'MicroPostController',
        ]);
    }
}
