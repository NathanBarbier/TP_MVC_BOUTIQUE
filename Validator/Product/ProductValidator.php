<?php

class ProductValidator extends Validator
{
    protected CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }
    public function validate(array $data): array {
        extract($data);
        $_SESSION['errorsModal'] = [];

        if (empty($name) && empty($quantity) && empty($price))
        {
            $_SESSION['errorsModal'][] = ProductErrorEnum::ERROR_INPUT_MISSING->value;

            return $_SESSION['errorsModal'];
        }

        if (!empty($id_category) && !is_numeric($id_category)) {
            $_SESSION['errorsModal'][] = ProductErrorEnum::ERROR_WRONG_TYPE->value;
        }

        if(
            !empty($id_category) && empty($this->categoryRepository->findOneById($id_category))
            ||
            !empty($id_hidden_category) && empty($this->categoryRepository->findOneById($id_hidden_category))
        ) {
            $_SESSION['errorsModal'][] = ProductErrorEnum::ERROR_CATEGORY_UNKNOWN->value;
        };

        return $_SESSION['errorsModal'];
    }
}
