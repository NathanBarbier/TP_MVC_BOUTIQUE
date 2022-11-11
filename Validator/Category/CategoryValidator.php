<?php

class CategoryValidator extends Validator
{
    public function validate(array $data): array {
        extract($data);

        $_SESSION['errors'] = [];

        if (empty($name))
        {
            $_SESSION['errors'][] = CategoryError::ERROR_NAME_MISSING->value;
        }

        return $_SESSION['errors'];
    }
}
