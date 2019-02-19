<?php

namespace App\Controller;

use App\Entity\Form;
use App\Form\FormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(FormType::class, new Form());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($form->getData());
            $manager->flush();
            $form->getData();
            return $this->redirectToRoute('/form');
        }

        return $this->render('form/index.html.twig', [
            'form' => $form->createView(),
        ]);


    }
}
