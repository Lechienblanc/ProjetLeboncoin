<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie', name: 'categorie')]
class CategorieController extends AbstractController
{
    #[Route('/{name}', name: 'list')]
    public function list(string $name, CategorieRepository $repository, ImageRepository  $imageRepository): Response
    {
        $category = $repository->findOneBy(["name" => $name],['id' => 'asc']);
        $image = $imageRepository->findOneBy([], ['id' => 'asc']);
        $article = $category->getArticles();
        //dd($category);

        return $this->render('categorie/index.html.twig', [
            'category' => $category,
            'article' => $article,
            'images' => $image
        ]);

    }

}
