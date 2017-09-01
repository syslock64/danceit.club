<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebsiteBundle:store:index.html.twig',[
        ]);
    }
}
