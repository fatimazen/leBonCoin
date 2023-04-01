<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            "annonces"=>$annonceRepository->findAll(),
        ]);
    }
    // #[Route('/category/{category}', name: 'list')]
    // public function list(Annonce $annonce, Request $request): Response
    // {
    //     return $this->render('annonce/index.html.twig', compact('annonce')
    // );
    // }
}
