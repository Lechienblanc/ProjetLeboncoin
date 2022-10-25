<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article', name: 'liste_article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index():Response
    {
        return $this->render('article_controller/index.html.twig');
    }


    #[Route('/addArticle', name: 'add_article')]
    public function add(EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $article->setName('Voiture de sport')
            ->setPrice('10.95')
            ->setDescription('Voiture Neuve Avec CT faite il y pas longtemps')
            ->setIdSeller('1')
            ->setImage('parpitié')
            ->setAvailable('TRUE');

        $entityManager->persist($article);
        $entityManager->flush();

        return new Response(sprintf('Nouveau article ajouté',
        $article->getId(),
        $article->getIdSeller()

        ));
    }

    //#[Route('/main', name: "categorie")]
    //public function details(EntityManagerInterface $entityManager)
    //{
    //    $repository = $entityManager->getRepository(Categorie::class);
    //    $categorie = $repository->findBy([],['id' => 'asc']);
    //    dd($categorie);
    //    return $this->render('article_controller/details.html.twig', [
    //        'categorie' => $categorie
    //    ]);

    //}


}
