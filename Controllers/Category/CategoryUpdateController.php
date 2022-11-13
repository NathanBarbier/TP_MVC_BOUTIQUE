<?php

class CategoryUpdateController extends AbstractController
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
                if (0 === $this->categoryRepository->update($data)) {
                    $_SESSION["errors"][] = "Something wrong happened, the update as been canceled";
                } else {
                    $_SESSION["success"][] = "the update has been successful";
                }
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        $_SESSION['cache'] = "update";

        header("location:?page=category&action=list");
    }
}
