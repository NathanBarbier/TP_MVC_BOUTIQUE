<?php

class CategoryValidator extends Validator
{
    public function validate(array $data): array {
        extract($data);
        $_SESSION['errorsModal'] = [];

        if (empty($name))
        {
            $_SESSION['errorsModal'][] = CategoryError::ERROR_NAME_MISSING->value;
        }

        return $_SESSION['errorsModal'];
    }
}
