<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="home_")

 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param BookRepository $bookRepository
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(BookRepository $bookRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $books = $bookRepository->findAll();
        $books = $paginator->paginate(
            $books,
            $request->query->getInt('page', 1),
            4/*limit per page*/
        );


        return $this->render('home/index.html.twig', [
            'books' => $books
        ]);
    }


    /**
     * @Route("/search", name="search", methods={"GET"})
     * @param Request $request
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function search(Request $request, BookRepository $bookRepository): Response
    {
        $query = $request->query->get('b');

        if (null !== $query) {
            $books = $bookRepository->findByQuery($query);
        }

        return $this->render('home/index.html.twig', [
            'books' => $books ?? [],
        ]);
    }

    /**
     * @Route("/autocomplete", name="autocomplete", methods={"GET"})
     * @param Request $request
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function autocomplete(Request $request, BookRepository $bookRepository): JsonResponse
    {
        $query = $request->query->get('search');

        if (null !== $query) {
            $books = $bookRepository->findByQuery($query);
        }

        return $this->json($books ?? [], 200, [], ['groups' => ['autocomplete']]);
    }
}
