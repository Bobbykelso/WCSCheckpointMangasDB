<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use App\Repository\CommentaryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/book", name="book_")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param BookRepository $bookRepository
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function showAllBooks(BookRepository $bookRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $books = $bookRepository->findAll();
        $books = $paginator->paginate(
            $books,
            $request->query->getInt('page', 1),
            4/*limit per page*/
        );
        return $this->render('home/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @IsGranted("ROLE_ADMIN")
     * @param Request $request
     * @return Response
     */
    public function newBook(Request $request): Response {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            $this->addFlash('success', 'Oeuvre crée avec succès');
            return $this->redirectToRoute('home_index');
        }
        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     * @ParamConverter("book", class="App\Entity\Book", options={"mapping": {"id": "id"}})
     * @param BookRepository $bookRepository
     * @param Book $book
     * @return Response
     */
    public function showOneBook(BookRepository $bookRepository, CommentaryRepository $commentaryRepository ,Book $book): Response
    {
        $book = $bookRepository->find($book);
        $comment = [];
        $comments = $commentaryRepository->findBy($comment, array('content' => 'DESC'));
        return $this->render('book/show.html.twig', [
            'book' => $book,
            'comments' => $comments
        ]);
    }

//    /**
//     * @Route("/toggle-active", name="toggle_active")
//     * @param Book $book
//     * @return Response
//     */
//    public function toggleActive(Book $book): Response
//    {
////        $book = new Book();
////        $entityManager = $this->getDoctrine()->getManager();
////        $entityManager->flush();
//        return $this->redirectToRoute('book_new');
//    }
}
