<?php

namespace App\Controller;

use App\Repository\ColorFeelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/color", name="colorFeel_")
     */

class ColorFeelController extends AbstractController
{

   /**
     * @Route("s", name="browse")
     */
    public function browse(ColorFeelRepository $colorFeelRepository)
    {
        return $this->render('color_feel/index.html.twig', [
            'colorFeels' => $colorFeelRepository->findAll(),
        ]);
    }
    /**
     * @Route("/read/{id}", name="read", requirements={"id" : "\d+"})
     */
    public function read(ColorFeelRepository $colorFeelRepository, $id)
    {
        $colorFeel = $colorFeelRepository->find($id);

        return $this->render('color_feel/read.html.twig', [
            'colorFeel' => $colorFeel,
        ]);
    }
    /**
     * @Route("/edit/{id}", name="edit", requirements={"id" : "\d+"})
     */
    public function edit(ColorFeelRepository $colorFeelRepository)
    {
        return $this->render('color_feel/edit.html.twig', []);
    }
    /**
     * @Route("/add", name="add")
     */
    public function add(ColorFeelRepository $colorFeelRepository, $id)
    {
        return $this->render('color_feel/add.html.twig', []);
    }
    /**
     * @Route("/delete/{id}", name="delete", requirements={"id" : "\d+"})
     */
    public function delete(ColorFeelRepository $colorFeelRepository, $id)
    {
        return $this->render('color_feel/delete.html.twig', []);
    }
}
