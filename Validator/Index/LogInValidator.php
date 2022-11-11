<?php

class LogInValidator extends Validator
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function validate(array $data): array
    {
        extract($data);

        $_SESSION['errors'] = [];

        if (empty($email) || empty($password))
        {
            $_SESSION['errors'][] = LogInErrorEnum::ERROR_EMPTY_INPUT->value;
            return $_SESSION['errors'];
        }

        $_SESSION['errors'] = $this->checkEmail($email);

        $user = $this->userRepository->findOneBy([
            "email" => $email,
        ]);

        if (empty($user)) {
            $_SESSION['errors'][] = LogInErrorEnum::ERROR_FORM_INCORRECT->value;
            return $_SESSION['errors'];
        }

        if (!password_verify($password, $user["password"])) {
            $_SESSION['errors'][] = LogInErrorEnum::ERROR_FORM_INCORRECT->value;
            return $_SESSION['errors'];
        }

        return $_SESSION['errors'];
    }
}
