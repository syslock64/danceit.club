<?php

namespace CpanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CpanelBundle\Form\RegistrationType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CpanelBundle:Default:index.html.twig');
    }
    public function formUserRegistrationAction()
    {
        $formRegistration = $this->createForm(RegistrationType::class);

//        $formFactory = $this->get('fos_user.registration.form.factory');
//        $form = $formFactory->createForm();
        return $this->render('CpanelBundle:block:user.register.html.twig',[
            'form' => $formRegistration->createView()
        ]);
    }
    public function formUserLoginAction()
    {
        return $this->render('CpanelBundle:block:user.login.html.twig');
    }
}
