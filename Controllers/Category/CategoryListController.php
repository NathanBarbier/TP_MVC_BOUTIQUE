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
        ob_start();
        $categories = $this->categoryRepository->findAll();

        require_once "Templates/Category/list.php";

        return ob_get_clean();
    }
}
