<?php

namespace App\Controller;

use App\Entity\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index()
    {
        $form = $this->createForm(Form::class, new Form());

        return $this->render('form/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
