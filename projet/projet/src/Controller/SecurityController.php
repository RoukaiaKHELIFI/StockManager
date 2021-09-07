<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
      
      //  throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

   

     /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome(){

        return $this->render('security/welcome.html.twig');
    }
    /**
     * @Route("/error", name="error")
     */
    public function error(){

        return $this->render('security/error.html.twig');
    }

     /**
     * @Route("/delete", name="delete_page")
     */
    public function delete_page(){
        return $this->render('profile/delete_user.html.twig');
    }


     /**
     * @Route("/delete_user/{id}", name="delete_user")
     */
    public function deleteUser($id)
    {
      $em = $this->getDoctrine()->getManager();
      $usrRepo = $em->getRepository(User::class);

      $user = $usrRepo->find($id);
      $em->remove($user);
      $em->flush();

      return $this->redirectToRoute('app_login');
     
    }

}
