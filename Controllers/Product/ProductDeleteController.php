<?php

class ProductDeleteController extends AbstractController
{
    protected ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function action(array $data): void
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        if (isset($data["id"]) && !empty($data["id"])) {
            try {
                $this->productRepository->delete($data["id"]);
                $_SESSION['success'][] = 'The product has been deleted';
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        if (!empty($data['category'])) {
            header("location:?page=product&action=list&category=". $data['category']);
        } else {
            header("location:?page=product&action=list");
        }
    }
}
