<?php

class LogInController extends AbstractController
{
    protected UserRepository $userRepository;
    protected LogInValidator $logInValidator;

    public function __construct()
    {
        $this->logInValidator = new LogInValidator();
        $this->userRepository = new UserRepository();
    }

    public function action(array $data): false|string
    {
        if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
            header("location:?page=category&action=list");
        }

        if (!empty($data["login"]) && $data["login"] == 1) {
            $errors = $this->logInValidator->validate($data);
            if (empty($errors)) {
               $user = $this->userRepository->findOneBy([
                    "email" => $data["email"],
               ]);

                $_SESSION["id"] = $user["id"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["password"] = $user["password"];
                $_SESSION["admin"] = $user["admin"];

                header("location:?page=category&action=list");
            }
        }

        ob_start();

        require_once 'Templates/Index/logIn.php';

        return ob_get_clean();
    }
}
