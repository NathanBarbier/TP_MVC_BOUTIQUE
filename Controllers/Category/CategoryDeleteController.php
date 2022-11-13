<?php

class CategoryDeleteController extends AbstractController
{
    protected CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function action(array $data): void
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        if (isset($data["id"]) && !empty($data["id"])) {
            try {
                $this->categoryRepository->delete($data["id"]);
                $_SESSION['success'][] = 'The category has been deleted';
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        header("location:?page=category&action=list");
    }
}
