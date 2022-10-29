<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use App\Factory\UserFactory;
use App\Form\PostFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AddController extends AbstractController
{
    #[Route('/add', name: 'app_add')]
    public function index(Request $request, EntityManagerInterface $entityManager, ): Response
    {
        $annonce = new Article();
        $user = $this->getUser();
        $form = $this->createForm(PostFormType::class, $annonce);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $annonce -> setIdSeller($user)
                ->setIsAvailable(true)
                ->setCreatedAt(new \DateTimeImmutable());
            //dd($annonce);
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('app_main');
        }

        return $this->render('add/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
