<?php


namespace App\Controller;


use App\Form\NewReviewForm;
use App\Form\NewUserForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/maleteo/opiniones", name="reviews")
     */
    public function newOpinion(Request $request, EntityManagerInterface $doctrine){
        $form = $this->createForm(NewReviewForm::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userReview = $form->getData();
            $doctrine->persist($userReview);
            $doctrine->flush();


            $this->addFlash('success', '¡Opinión guardada correctamente!');
            return $this->redirectToRoute('maleteo_homepage');

        }
        return $this->render(
            'newReview.html.twig',
            ['opinionForm' => $form->createView()]
        );
    }

    /**
     * @Route("/maleteo/registro", name="app_registry")
     */
    public function newUser(Request $request, EntityManagerInterface $doctrine){
        $form = $this->createForm(NewUserForm::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newUser = $form->getData();

            $userPassword = $newUser->getPassword();
            $newPassword = password_hash($userPassword, PASSWORD_DEFAULT);
            $newUser->setPassword($newPassword);

            $doctrine->persist($newUser);
            $doctrine->flush();


            $this->addFlash('success', '¡Bienvenido!');
            return $this->redirectToRoute('app_login');

        }
        return $this->render(
            'newUser.html.twig',
            ['newUserForm' => $form->createView()]
        );
    }

}