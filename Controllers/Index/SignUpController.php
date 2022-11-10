<?php

class SignUpController extends AbstractController
{
    protected CategoryRepository $userRepository;
    protected SignUpValidator $signUpValidator;

    public function __construct()
    {
        $this->userRepository = new CategoryRepository();
        $this->signUpValidator = new SignUpValidator();
    }

    public function action(array $data = [])
    {
        if (!empty($data["signup"]) && $data["signup"] == 1) {
            $errors = $this->signUpValidator->validate($data);
            if (empty($errors)) {
                try {
                    if (0 === $this->userRepository->create($data)) {
                        $errors = "Something wrong happened, we can't complete the registration :/";
                    } else {
                        header("location:?page=index&action=logIn");
                    };
                } catch (Exception $e) {
                    $errors = $e->getMessage();
                }
            }
        }

        ob_start();

        require_once 'Templates/Index/signUp.php';

        return ob_get_clean();
    }
}
