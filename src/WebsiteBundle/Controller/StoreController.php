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
        $token = $request->request->get('_t',null);
        $mount = $request->request->get('_m',null);
        $email = $request->request->get('_e',null);
        $response = ['success'=>!1,'messages'];
return new JsonResponse($response,$token,$mount,$email);


    }
}
