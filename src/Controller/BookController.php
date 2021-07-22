<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/book", name="book")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function showAllBooks(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();

        return $this->render('home/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/show{book_id}", name="show")
     * @ParamConverter("user", class="App\Entity\Book", options={"mapping": {"book_id": "id"}})
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function showOneBook(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findOneBy();

        return $this->render('book/show.html.twig', [
            'books' => $books,
        ]);
    }
}
