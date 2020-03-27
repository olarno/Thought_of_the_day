<?php

namespace App\Controller;

use App\Entity\Thought;
use App\Form\ThoughtType;
use App\Repository\ThoughtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/thought", name="thought_")
 */
class ThoughtController extends AbstractController
{
    /**
     * Browse - 
     * Liste TOUTES les thoughts en les affichant sous forme de liste
     * Chaque entree est afficher avec sa couleur 
     * 
     * @Route("s", name="browse")
     */
    // TODO : Ajouter un systeme pour archiver les données, et ainsi épurée un peu la lsite
    public function browse(ThoughtRepository $thoughtRepository)
    {
        return $this->render('thought/index.html.twig', [
            'thoughts' => $thoughtRepository->findAll(),
        ]);
    }
    /**
     * Read - 
     * Affiche le contenu du thought precis 
     * Incluant : 
     *  - title     =>   le titre du thought
     *  - content   =>   le contenu du thought 
     *  - colors    =>   retourne un tableau d'objet ColorFeel issue de la relation 
     * @Route("/read/{id}", name="read", requirements={"id" : "\d+"})
     */
    public function read(ThoughtRepository $thoughtRepository, Thought $thought)
    {
        return $this->render('thought/read.html.twig', [
            'thought' => $thought,
        ]);
    }

    // TODO
    /**
     * Edit - Encours de developpement 
     * 
     * @Route("/edit/{id}", name="edit", requirements={"id" : "\d+"})
     */
    public function edit()
    {
        return $this->render('thought/edit.html.twig', [
        ]);
    }
    /**
     * Add - 
     * Affiche un formulaire d'ajout gerer par le ThoughtType
     * 
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request)
    {
        $form = $this->createForm(ThoughtType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $thought = $form->getData();
            dump($thought);

            $em = $this->getDoctrine()->getManager();
            $em->persist($thought);
            $em->flush();

            return $this->redirectToRoute('main');
        }


        return $this->render('thought/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    // TODO
    /**
     * Delete - En cours de developpement
     * 
     * @Route("/delete/{id}", name="delete", requirements={"id" : "\d+"})
     */
    public function delete()
    {
        return $this->render('thought/delete.html.twig', [
        ]);
    }
}
