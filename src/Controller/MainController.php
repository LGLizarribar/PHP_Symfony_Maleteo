<?php


namespace App\Controller;

use App\Entity\UserReviews;
use App\Form\NewReviewForm;
use App\Entity\DemoUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function redirectToLogin()
    {
        return $this->redirectToRoute('maleteo_homepage');

    }

    /**
     * @Route("/maleteo", name="maleteo_homepage")
     */
    public function index(EntityManagerInterface $doctrine)
    {
        $repo = $doctrine->getRepository(UserReviews::class);
        $userReviews = $repo->findAll();
        return $this->render('base.html.twig', [
            "userReviews"=>$userReviews
        ]);

    }

    /**
     * @Route("/maleteo/newDemoRequest", name="new_demo_request")
     */

    public function newDemo(Request $request, EntityManagerInterface $doctrine){
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $policyAccept = $request->request->getBoolean('policyAccept');
        $city = $request->request->get('city');


        $demoUser = new DemoUser();
        $demoUser->setName($name);
        $demoUser->setEmail($email);
        $demoUser->setCity($city);
        $demoUser->setPolicyAccept($policyAccept);

        $doctrine->persist($demoUser);

        $doctrine->flush();

        return $this->redirectToRoute('maleteo_homepage');
    }

    /**
     * @Route("/maleteo/solicitudes")
     */
    public function showDemoRequests(EntityManagerInterface $doctrine){
        $repo = $doctrine->getRepository(DemoUser::class);
        $demoUserRequests = $repo->findAll();
        return $this->render('demo.html.twig', [
            "demoUserRequests"=>$demoUserRequests
        ]);

    }



}