<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Category;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category", name="category_")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function showAllCategories(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     * @ParamConverter("category", class="App\Entity\Category", options={"mapping": {"id": "id"}})
     * @param BookRepository $bookRepository
     * @param Category $category
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function showBookByCategory(BookRepository $bookRepository, Category $category, Request $request, PaginatorInterface $paginator):Response
    {
        $books = $bookRepository->findBooksByCategory($category);
        $books = $paginator->paginate(
            $books,
            $request->query->getInt('page', 1),
            4/*limit per page*/
        );
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'books' => $books
        ]);

    }
}
