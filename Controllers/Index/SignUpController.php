<?php

class SignUpController extends AbstractController
{
    protected UserRepository $userRepository;
    protected SignUpValidator $signUpValidator;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->signUpValidator = new SignUpValidator();
    }

    public function action(array $data): false|string
    {
        if (!empty($data["signup"]) && $data["signup"] == 1) {
            $errors = $this->signUpValidator->validate($data);
            if (empty($errors)) {
                try {
                    if (0 === $this->userRepository->create($data)) {
                        $_SESSION['errors'][] = "Something wrong happened, we can't complete the registration :/";
                    } else {
                        $_SESSION['success'][] = 'your registration has been successful';
                        header("location:?page=index&action=logIn");
                    };
                } catch (Exception $e) {
                    $errors = $e->getMessage();
                }
            }
        }

        ob_start();

        require_once RouteEnum::INDEX_SIGNUP->value;

        return ob_get_clean();
    }
}
