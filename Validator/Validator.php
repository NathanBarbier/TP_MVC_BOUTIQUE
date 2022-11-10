<?php

abstract class Validator
{
    protected function checkEmail(string $email): array
    {
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error[] = LogInErrorEnum::ERROR_INPUT_TYPE_EMAIL_INCORRECT->value;
            return $error;
        }

        return [];
    }
}
