<?php

namespace App\Controller;

use App\Repository\ThoughtRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    
    /**
     * Homepage - Actuellement vide 
     * Retourne la vue de la Homepage
     *
     * @Route("/", name="homepage")
     */
    public function home()
    {
        return $this->render('main/home.html.twig', [
            
        ]);
    }
    /**
     * Main - 
     * Retourne une vue contenant les 10 dernieres entrees classees par ordre du plus recent (id en Descroissant) 
     * Affichage sous forme de cards (bootstrap)
     *
     * @Route("/main", name="main")
     */
    public function index(ThoughtRepository $thoughtRepository)
    {
        return $this->render('main/index.html.twig', [
            'thoughts' => $thoughtRepository->findTenLastComplete(),
        ]);
    }

    // TODO
    /**
     * Month - En cours de développement
     * Retourne une vue contenant les posts du mois 
     * Affichage sous forme de cards (bootstrap)
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