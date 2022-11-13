<?php

class ProductListController extends AbstractController
{
    protected ProductRepository $productRepository;
    protected CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        $this->categoryRepository = new CategoryRepository();
    }

    public function action(array $data): false|string
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        $get=[];

        ob_start();
        if (isset($data['category']) && !empty($data['category'])) {
            try {
                $products = $this->productRepository->findBy([
                    'id_category' => $data['category']
                ]);
                $get = [
                    'category' => $data['category']
                ];
            } catch (Exception $e) {
                $_SESSION['errors'] = $e->getMessage();
            }
        } else {
            try {
                $products = $this->productRepository->findAll();
            } catch (Exception $e) {
                $_SESSION['errors'] = $e->getMessage();
            }
        }

        $categories = $this->categoryRepository->findAll();

        require_once RouteEnum::PRODUCT_LIST->value;

        return ob_get_clean();
    }
}
