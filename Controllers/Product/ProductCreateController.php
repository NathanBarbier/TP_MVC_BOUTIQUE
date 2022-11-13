<?php

class ProductCreateController extends AbstractController
{
    protected ProductRepository $productRepository;
    protected ProductValidator $productValidator;

    public function __construct()
    {
        $this->productValidator = new ProductValidator();
        $this->productRepository = new ProductRepository();
    }

    public function action(array $data): void
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }
        $errors = $this->productValidator->validate($data);

        if (empty($errors)) {
            try {
                if (0 === $this->productRepository->create($data)) {
                    $_SESSION["errors"][] = "Something wrong happened, the creation as been canceled";
                } else {
                    $_SESSION["success"][] = "the creation has been successful";
                }
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        $_SESSION['cache'] = "create";

        if (!empty($data['category'])) {
            header("location:?page=product&action=list&category=". $data['category']);
        } else {
            header("location:?page=product&action=list");
        }
    }
}
