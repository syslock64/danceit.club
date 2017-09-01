<?php

namespace WebsiteBundle\Controller;

use Culqi\Culqi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class StoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebsiteBundle:store:index.html.twig',[
        ]);
    }

    public function chargeAction(Request $request)
    {
        var_dump($request);die();
    }
}
