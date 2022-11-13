<?php

class UserUpdateController extends AbstractController
{
    protected UserRepository $userRepository;
    protected UserValidator $userValidator;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->userValidator = new UserValidator();
    }

    public function action(array $data): void
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        $errors = $this->userValidator->validateUpdate($data);

        if (empty($errors)) {
            try {
                if (0 === $this->userRepository->update($data)) {
                    $_SESSION["errors"][] = "Something wrong happened, the update as been canceled";
                } else {
                    $_SESSION["success"][] = "the update has been successful";
                    if ($data["id"] == $_SESSION["id"]) {
                        $_SESSION["email"] = $data["email"];
                        $_SESSION["role"] = $data["role"];
                    }
                }
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        $_SESSION['cache'] = "update";

        header("location:?page=user&action=list");
    }
}
