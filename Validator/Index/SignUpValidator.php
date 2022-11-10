<?php

class SignUpValidator extends Validator
{
    protected CategoryRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new CategoryRepository();
    }

    public function validate(array $data): array
    {
        extract($data);
        $errors = [];

        if (empty($email) || empty($password) || empty($confirmedPassword))
        {
            $errors[] = SignUpErrorEnum::ERROR_EMPTY_INPUT->value;
            return $errors;
        }

        $errors = $this->checkEmail($email);

        if (!empty($this->userRepository->findOneBy([
            "email" => $email,
        ]))) {
            $errors[] = SignUpErrorEnum::ERROR_EMAIL_ALREADY_CHOSEN->value;
        }

        if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
            $errors[] = SignUpErrorEnum::ERROR_WRONG_PASSWORD->value;
        }

        if ($password !== $confirmedPassword) {
            $errors[] = SignUpErrorEnum::ERROR_PASSWORD_DONT_MATCH->value;
        }

        return $errors;
    }
}
