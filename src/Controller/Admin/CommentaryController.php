<?php

namespace App\Controller\Admin;

use App\Entity\Commentary;
use App\Repository\CommentaryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/commentary", name="admin_commentary_")
 */
class CommentaryController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(CommentaryRepository $commentaryRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $commentaries = $paginator->paginate(
            $commentaryRepository->findAll(),
            $request->query->getInt('page', 1),
            10/*limit per page*/
        );
        return $this->render('/admin/commentary/index.html.twig', [
            'commentaries' => $commentaries,
        ]);
    }

//    /**
//     * @Route("/new", name="new", methods={"GET","POST"})
//     */
//    public function new(Request $request): Response
//    {
//        $commentary = new Commentary();
//        $form = $this->createForm(CommentaryType::class, $commentary);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($commentary);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('admin_commentary_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->renderForm('/admin/commentary/new.html.twig', [
//            'commentary' => $commentary,
//            'form' => $form,
//        ]);
//    }


    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Commentary $commentary): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentary->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commentary);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_commentary_index', [], Response::HTTP_SEE_OTHER);
    }
}
