<?php

class AccountValidator extends Validator
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function validateEmail(array $data): array
    {
        extract($data);
        $_SESSION['errors'] = [];

        if (empty($email))
        {
            $_SESSION['errors'][] = UserErrorEnum::ERROR_EMPTY_INPUT->value;
            return $_SESSION['errors'];
        }

        $_SESSION['errors'] = $this->checkEmail($email);

        if (!empty($this->userRepository->findOneBy([
            "email" => $email,
        ]))) {
            $_SESSION['errors'][] = UserErrorEnum::ERROR_EMAIL_ALREADY_CHOSEN->value;
        }

        return $_SESSION['errors'];
    }

    public function validatePassword(array $data): array
    {
        extract($data);
        $_SESSION['errors'] = [];

        if (empty($oldPassword) || empty($password) || empty($confirmedPassword))
        {
            $_SESSION['errors'][] = UserErrorEnum::ERROR_EMPTY_INPUT->value;
            return $_SESSION['errors'];
        }

        if (!password_verify($oldPassword, $_SESSION["password"])) {
            $_SESSION['errors'][] = UserErrorEnum::ERROR_WRONG_OLD_PASSWORD->value;
            return $_SESSION['errors'];
        }

        if ($oldPassword === $password) {
            $_SESSION['errors'][] = UserErrorEnum::ERROR_NEW_AND_OLD_PASSWORD_EQUAL->value;
        }

        if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
            $_SESSION['errors'][] = UserErrorEnum::ERROR_WRONG_PASSWORD->value;
        }

        if ($password !== $confirmedPassword) {
            $_SESSION['errors'][] = UserErrorEnum::ERROR_PASSWORD_DONT_MATCH->value;
        }

        return $_SESSION['errors'];
    }
}
