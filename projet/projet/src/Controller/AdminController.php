<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



  /**
     * @Route("/admin", name="admin_")
     */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

/**
 *Liste des utilisateurs du site 
 * 
 * @Route("/users", name="users")
     */
    public function usersList(UserRepository $users  )
    {return $this->render("admin/users.html.twig",[

        'users' => $users->findAll()
    ]);
     
    }

/**
 *Modifier un utilisateur
 * 
 * @Route("/users/edit/{id}", name="edit_user")
     */
    public function editUser(User $user , Request $request){
$form = $this->createForm(EditUserType::class , $user);
$form->handleRequest($request);
if($form->isSubmitted() && $form->isValid()){


    $entityManager =$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $this->addFlash('message' , 'Utilisateur modifé avec succés');
    return $this->redirectToRoute('admin_users');
}
return $this->render ('admin/edituser.html.twig',[

    'userForm' => $form->createView()
]);

    }




}
