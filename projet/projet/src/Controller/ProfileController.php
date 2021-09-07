<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\EditProfileType;
use App\Form\EditPasswordType;
use App\Security\AppCustomAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(): Response
    {
        return $this->render('profile/profile.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    /**
 *Modifier un utilisateur
    * 
    * @Route("/settings/edit/{id}", name="settings")
    */
    public function editUser(User $user , Request $request){
        $form = $this->createForm(EditProfileType::class , $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager =$this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        
            $this->addFlash('message' , 'Utilisateur modifé avec succés');
            return $this->redirectToRoute('admin_users');
        }
        return $this->render ('profile/editprofile.html.twig',[
        
            'form' => $form->createView()
        ]);
        
            }

                   /**
 *Modifier le mot de passe 
    * 
    * @Route("/editpassword/{id}", name="password")
    */
    public function editPassword(User $user , Request $request,UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, AppCustomAuthenticator $authenticator){
        $form = $this->createForm(EditPasswordType::class , $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }
        return $this->render ('profile/editpassword.html.twig',[
        
            'form' => $form->createView()
        ]);
        
            }

 


    

}
