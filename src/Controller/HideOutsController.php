<?php

namespace App\Controller;

use App\Entity\HideOuts;
use App\Form\HideOutsType;
use App\Repository\HideOutsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hideouts')]
class HideOutsController extends AbstractController
{
    #[Route('/', name: 'hide_outs_index', methods: ['GET'])]
    public function index(HideOutsRepository $hideOutsRepository): Response
    {
        return $this->render('hide_outs/index.html.twig', [
            'hide_outs' => $hideOutsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'hide_outs_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $hideOut = new HideOuts();
        $form = $this->createForm(HideOutsType::class, $hideOut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hideOut);
            $entityManager->flush();

            return $this->redirectToRoute('hide_outs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hide_outs/new.html.twig', [
            'hide_out' => $hideOut,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'hide_outs_show', methods: ['GET'])]
    public function show(HideOuts $hideOut): Response
    {
        return $this->render('hide_outs/show.html.twig', [
            'hide_out' => $hideOut,
        ]);
    }

    #[Route('/{id}/edit', name: 'hide_outs_edit', methods: ['GET','POST'])]
    public function edit(Request $request, HideOuts $hideOut): Response
    {
        $form = $this->createForm(HideOutsType::class, $hideOut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hide_outs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hide_outs/edit.html.twig', [
            'hide_out' => $hideOut,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'hide_outs_delete', methods: ['POST'])]
    public function delete(Request $request, HideOuts $hideOut): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hideOut->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hideOut);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hide_outs_index', [], Response::HTTP_SEE_OTHER);
    }
}
