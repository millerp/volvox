<?php

namespace App\Controller;

use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="dashboard")
     */
    public function index(ProductRepository $productRepository, ProductCategoryRepository $categoryRepository)
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'products_count' => $productRepository->count([]),
            'categories_count' => $categoryRepository->count([]),
        ]);
    }
}
