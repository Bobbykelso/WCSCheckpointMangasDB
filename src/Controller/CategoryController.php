<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Category;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @return Response
     */
    public function showBookByCategory(BookRepository $bookRepository, Category $category):Response
    {
        $books = $bookRepository->findBooksByCategory($category);
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'books' => $books
        ]);

    }
}
