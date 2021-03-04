<?php


namespace App\Controller;

use App\Entity\UserReviews;
use App\Form\NewReviewForm;
use App\Entity\DemoUser;
use ContainerAJTERlb\getNewReviewFormService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Route("/")
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
     * @Route("/newdemo")
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

        return $this->render('base.html.twig');
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

    /**
     * @Route("/maleteo/opiniones")
     */
    public function newOpinion(Request $request){

        $form = $this->createForm(NewReviewForm::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $review = new UserReviews();
            $review->setName('name');
            $review->setCity('city');
            $review->setReview('review');


            $doctrine->persist($review);

            $doctrine->flush();

            return $this->render('base.html.twig');
        }

        return $this->render(
            'newReview.html.twig',
            ['opinionForm' => $form->createView()]
        );

    }

}