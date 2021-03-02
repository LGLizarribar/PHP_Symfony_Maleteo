<?php


namespace App\Controller;

use App\Form\DemoForm;
use App\Model\DemoUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {

        return $this->render('base.html.twig');

    }

    /**
     * @Route("/newdemo")
     */

    public function newDemo(Request $request){
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $policyAccept = $request->request->getBoolean('policyAccept');
        $city = $request->request->get('city');

        echo "You have selected :" .$city;
        dd($name, $email, $city, $policyAccept);

        $demoUser = new DemoUser();
        $demoUser->setName($name);
        $demoUser->setEmail($email);
        $demoUser->setCity($city);
        $demoUser->setPolicyAccept($policyAccept);
    }

}