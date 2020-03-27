<?php

namespace App\Controller;

use App\Entity\ColorFeel;
use App\Repository\ColorFeelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/color", name="colorFeel_")
 */

class ColorFeelController extends AbstractController
{

    /**
     * Browse -  
     * Index des couleurs / sentiments 
     * Retourne une vue listant les sentiments par leur nom
     *   
     * @Route("s", name="browse")
     */
    public function browse(ColorFeelRepository $colorFeelRepository)
    {
        return $this->render('color_feel/index.html.twig', [
            'colorFeels' => $colorFeelRepository->findAll(),
        ]);
    }
    /**
     * Read - 
     * Affiche le contenu d'un sentiment precis sous forme de card - 
     * Incluant : 
     *  - feel          =>  nom du sentiment 
     *  - description   =>  description rapide 
     *  - color         =>  la couleur associee
     * @Route("/read/{id}", name="read", requirements={"id" : "\d+"})
     */
    public function read(ColorFeelRepository $colorFeelRepository, ColorFeel $colorFeel)
    {
        return $this->render('color_feel/read.html.twig', [
            'colorFeel' => $colorFeel,
        ]);
    }

    //=============================//
    // Le reste du Bread (Edit/Add/Delete) 
    // est en cours de développement 
    //=============================//
    // TODO
    /**
     * @Route("/edit/{id}", name="edit", requirements={"id" : "\d+"})
     */
    public function edit()
    {
        return $this->render('color_feel/edit.html.twig', []);
    }
    /**
     * @Route("/add", name="add")
     */
    public function add()
    {
        return $this->render('color_feel/add.html.twig', []);
    }
    /**
     * @Route("/delete/{id}", name="delete", requirements={"id" : "\d+"})
     */
    public function delete()
    {
        return $this->render('color_feel/delete.html.twig', []);
    }
}
