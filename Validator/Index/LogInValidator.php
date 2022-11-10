<?php

class LogInValidator extends Validator
{
    protected CategoryRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new CategoryRepository();
    }

    public function validate($data): array
    {
        extract($data);
        var_dump($data);
        $errors = [];


        if (empty($email) || empty($password))
        {
            $errors[] = LogInErrorEnum::ERROR_EMPTY_INPUT->value;
            return $errors;
        }

        $errors = $this->checkEmail($email);

        $user = $this->userRepository->findOneBy([
            "email" => $email,
        ]);

        if (empty($user)) {
            $errors[] = LogInErrorEnum::ERROR_FORM_INCORRECT->value;
            return $errors;
        }

        if (!password_verify($password, $user["password"])) {
            $errors[] = LogInErrorEnum::ERROR_FORM_INCORRECT->value;
            return $errors;
        }

        return $errors;
    }
}
