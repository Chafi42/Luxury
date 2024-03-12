<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JobsController extends AbstractController
{//liste de tous les jobs
    #[Route('/jobs', name: 'app_jobs')]
    public function index(): Response
    {
        return $this->render('jobs/index.html.twig', [
        ]);
    }


    // #[Route('/jobs', name: 'app_jobs')]deuxieme rout e pour le detail d' un job!!!!!!!!!!!!!!!!!!!!!!!!!A FAIRE PAR L4 ID JE PENSE
    // public function index(): Response
    // {
    //     return $this->render('jobs/index.html.twig', [
    //         'controller_name' => 'JobsController',
    //     ]);
    // }
}
