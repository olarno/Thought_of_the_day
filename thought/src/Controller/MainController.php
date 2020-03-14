<?php

namespace App\Controller;

use App\Repository\ThoughtRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * Affiche les 10 derniere entrées
     *
     * @Route("/main", name="main")
     */
    public function index(ThoughtRepository $thoughtRepository)
    {
        return $this->render('main/index.html.twig', [
            'thoughts' => $thoughtRepository->findTenLastComplete(),
        ]);
    }

    /**
     * récupere les entrée du mois en cours
     *
     * @Route("/month", name="main_month")
     */
    public function month(ThoughtRepository $thoughtRepository)
    {

        return $this->render('main/month.html.twig', [
            'thoughts' => $thoughtRepository->findCurrentMonth(),
        ]);
    }
}