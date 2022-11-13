<?php

class CategoryListController extends AbstractController
{
    protected CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function action(array $data): false|string
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        ob_start();
        $categories = $this->categoryRepository->findAll();

        require_once RouteEnum::CATEGORY_LIST->value;

        return ob_get_clean();
    }
}
