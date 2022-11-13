<?php

class UserValidator extends Validator
{
    protected CategoryRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new CategoryRepository();
    }

    public function validate(array $data): array
    {
        extract($data);
        $_SESSION['errors'] = [];

        if (empty($email) || empty($password) || empty($confirmedPassword))
        {
            $_SESSION['errors'][] = SignUpErrorEnum::ERROR_EMPTY_INPUT->value;
            return $_SESSION['errors'];
        }

        $_SESSION['errors'] = $this->checkEmail($email);

        if (!empty($this->userRepository->findOneBy([
            "email" => $email,
        ]))) {
            $_SESSION['errors'][] = SignUpErrorEnum::ERROR_EMAIL_ALREADY_CHOSEN->value;
        }

        if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
            $_SESSION['errors'][] = SignUpErrorEnum::ERROR_WRONG_PASSWORD->value;
        }

        if ($password !== $confirmedPassword) {
            $_SESSION['errors'][] = SignUpErrorEnum::ERROR_PASSWORD_DONT_MATCH->value;
        }

        return $_SESSION['errors'];
    }

    public function validateUpdate(array $data): array
    {
        extract($data);
        $_SESSION['errors'] = [];

        if (empty($email))
        {
            $_SESSION['errors'][] = SignUpErrorEnum::ERROR_EMPTY_INPUT->value;
            return $_SESSION['errors'];
        }

        if (!empty($this->userRepository->findOneBy([
            "email" => $email,
        ]))) {
            $_SESSION['errors'][] = SignUpErrorEnum::ERROR_EMAIL_ALREADY_CHOSEN->value;
        }

        return $_SESSION['errors'];
    }
}
