<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller
{
    public function indexAction()
    {
        $formFactory = $this->get('fos_user.registration.form.factory');
        $form = $formFactory->createForm();
        return $this->render('WebsiteBundle:home:index.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
