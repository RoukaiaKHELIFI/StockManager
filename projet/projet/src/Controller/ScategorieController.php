<?php

namespace App\Controller;

use App\Entity\Scategorie;
use App\Form\ScategorieType;
use App\Repository\ScategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scategorie")
 */
class ScategorieController extends AbstractController
{
    /**
     * @Route("/", name="scategorie_index", methods={"GET"})
     */
    public function index(ScategorieRepository $scategorieRepository): Response
    {
        return $this->render('scategorie/index.html.twig', [
            'scategories' => $scategorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scategorie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scategorie = new Scategorie();
        $form = $this->createForm(ScategorieType::class, $scategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scategorie);
            $entityManager->flush();

            return $this->redirectToRoute('scategorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('scategorie/new.html.twig', [
            'scategorie' => $scategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scategorie_show", methods={"GET"})
     */
    public function show(Scategorie $scategorie): Response
    {
        return $this->render('scategorie/show.html.twig', [
            'scategorie' => $scategorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scategorie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Scategorie $scategorie): Response
    {
        $form = $this->createForm(ScategorieType::class, $scategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scategorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('scategorie/edit.html.twig', [
            'scategorie' => $scategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scategorie_delete", methods={"POST"})
     */
    public function delete(Request $request, Scategorie $scategorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scategorie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scategorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
