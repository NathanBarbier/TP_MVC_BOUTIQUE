<?php

class UserDeleteController extends AbstractController
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function action(array $data): void
    {
        if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("location:?page=user&action=notAllowed");
        }

        if (isset($data["id"]) && !empty($data["id"]) && $data["id"] != $_SESSION["id"]) {
            try {
                $this->userRepository->delete($data["id"]);
                $_SESSION['success'][] = 'The user has been deleted';
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }

        header("location:?page=user&action=list");
    }
}
