<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\ChangePassword;
use App\Form\ChangePasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ChangePasswordController extends AbstractController
{
 



 /**
     * @Route("/change-password", name="change_password")
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $changePasswordModel = new ChangePassword();
        $form = $this->createForm(ChangePasswordType::class, $changePasswordModel);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $user = $entityManager->find(User::class, $this->getUser()->getId());
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('newPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('admin_users');
        }

        return $this->render('profile/change_password.html.twig', array(
            'changePasswordForm' => $form->createView(),
        ));        
    }


}
