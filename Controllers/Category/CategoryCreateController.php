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
        $errors = $this->categoryValidator->validate($data);

        if (empty($errors)) {
            $this->categoryRepository->create($data);
        }

        header("location:?page=category&action=list");
    }
}
