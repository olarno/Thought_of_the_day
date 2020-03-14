<?php

namespace App\Controller;

use App\Repository\ThoughtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/thought", name="thought_")
 */
class ThoughtController extends AbstractController
{
    /**
     * @Route("s", name="browse")
     */
    public function browse(ThoughtRepository $thoughtRepository)
    {
        return $this->render('thought/index.html.twig', [
            'thoughts' => $thoughtRepository->findAll(),
        ]);
    }
    /**
     * @Route("/read/{id}", name="read", requirements={"id" : "\d+"})
     */
    public function read(ThoughtRepository $thoughtRepository, $id)
    {
        $thought = $thoughtRepository->findComplete($id);

        return $this->render('thought/read.html.twig', [
            'thought' => $thought,
        ]);
    }
    /**
     * @Route("/edit/{id}", name="edit", requirements={"id" : "\d+"})
     */
    public function edit(ThoughtRepository $thoughtRepository, $id)
    {
        $thought = $thoughtRepository->findComplete($id);

        return $this->render('thought/edit.html.twig', [
            'thought' => $thought,
        ]);
    }
    /**
     * @Route("/add", name="add")
     */
    public function add(ThoughtRepository $thoughtRepository)
    {

        return $this->render('thought/add.html.twig', []);
    }
    /**
     * @Route("/delete/{id}", name="delete", requirements={"id" : "\d+"})
     */
    public function delete(ThoughtRepository $thoughtRepository, $id)
    {
        $thought = $thoughtRepository->findComplete($id);

        return $this->render('thought/delete.html.twig', [
            'thought' => $thought,
        ]);
    }
}
