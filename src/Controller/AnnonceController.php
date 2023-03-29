<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
   
{

    #[Route('/annonce/0', name: 'annonce.show')]
    public function index(): Response
    {
        return $this->render('annonce/show.html.twig', [
            'controller_name' => 'AnnoneController',
        ]);
    }

    #[Route('/annonce/{annonce}', name: 'annonce')]
    public function list(Annonce $annonce, Request $request): Response
    {
        return $this->render('annonce/index.html.twig', [
            'annonce'=>$annonce
        ]);
        
    }
}






