<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategorieController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'leboncoin',
            "annonces"=>$annonceRepository->findAll(),
        ]);


}

}