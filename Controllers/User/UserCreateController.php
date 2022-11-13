<?php

class UserCreateController extends AbstractController
{
    protected UserRepository $userRepository;
    protected UserValidator $userValidator;

    public function __construct()
    {
        $this->userValidator = new UserValidator();
        $this->userRepository = new UserRepository();
    }

    public function action(array $data): void
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        $errors = $this->userValidator->validate($data);

        if (empty($errors)) {
            try {
                if (0 === $this->userRepository->create($data)) {
                    $_SESSION["errors"][] = "Something wrong happened, the creation as been canceled";
                } else {
                    $_SESSION["success"][] = "the creation has been successful";
                }
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        $_SESSION['cache'] = "create";

        header("location:?page=user&action=list");
    }
}
