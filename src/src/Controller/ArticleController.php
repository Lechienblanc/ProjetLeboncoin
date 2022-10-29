<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article', name: 'detail')]
class ArticleController extends AbstractController
{
    #[Route('/{id}', name: 'article')]
    public function index(int $id, ArticleRepository $articleRepository, ImageRepository $imageRepository): Response
    {
        $article = $articleRepository->findOneBy(['id'=>$id], ['id' => 'asc']);
        $image = $imageRepository->findBy(["article"=>$id], ['id' => 'asc']);
        //dd($article);

        return $this->render('article/index.html.twig', [
            'article' => $article,
            'image' => $image
        ]);
    }
}
