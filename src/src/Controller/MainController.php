<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: "app_main")]
    public function details(EntityManagerInterface $entityManager):Response
    {
        $repository = $entityManager->getRepository(Categorie::class);
        $categorie = $repository->findBy([],['id' => 'asc']);
        //dd($categorie);
        return $this->render('main/index.html.twig', [
            'categorie' => $categorie
        ]);
    }

    #[Route('/addCategorie', name: 'add_categorie')]
    public function add(EntityManagerInterface $entityManager): Response
    {
        $categorie = new Categorie();
        $categorie->setName('Informatique');

        $entityManager->persist($categorie);
        $entityManager->flush();

        return new Response(sprintf('Nouvelle catégorie ajouté',
            $categorie->getId()

        ));
    }
}
