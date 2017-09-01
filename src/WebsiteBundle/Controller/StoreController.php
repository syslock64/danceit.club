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

        if(empty($token) || empty($mount) || empty($email))
        {
            $response['messages'][] = 'Vuelve a procesar tu compra, ocurrio un error mientras se enviaron los datos.';
            return new JsonResponse($response);
        }

        try{
            $SECRET_KEY = "sk_test_0RIu4kUklwbEitlT";
            $culqi = new Culqi(array('api_key' => $SECRET_KEY));

            $charge = $culqi->Charges->create(
                array(
                    "amount" => $mount,
                    "capture" => true,
                    "currency_code" => "PEN",
                    "email" => $email,
                    "description" => "Venta de prueba",
                    "installments" => 0,
                    "metadata" => array("test"=>"test"),
                    "source_id" => $token
                )
            );
            return  new JsonResponse($charge);
        }
        catch(\Exception $e)
        {
            return new JsonResponse($e->getMessage());
        }

    }
}
