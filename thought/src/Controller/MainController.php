<?php

namespace App\Controller;

use App\Repository\ThoughtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(ThoughtRepository $thoughtRepository)
    {
        return $this->render('main/index.html.twig', [
            'thoughts' => $thoughtRepository->findAll(),
        ]);
    }
}
