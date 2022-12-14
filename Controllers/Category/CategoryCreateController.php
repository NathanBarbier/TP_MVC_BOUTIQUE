<?php

class CategoryCreateController extends AbstractController
{
    protected CategoryRepository $categoryRepository;
    protected CategoryValidator $categoryValidator;

    public function __construct()
    {
        $this->categoryValidator = new CategoryValidator();
        $this->categoryRepository = new CategoryRepository();
    }

    public function action(array $data): void
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        $errors = $this->categoryValidator->validate($data);

        if (empty($errors)) {
            try {
                if (0 === $this->categoryRepository->create($data)) {
                    $_SESSION["errors"][] = "Something wrong happened, the creation as been canceled";
                } else {
                    $_SESSION["success"][] = "the creation has been successful";
                }
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        $_SESSION['cache'] = "create";

        header("location:?page=category&action=list");
    }
}
