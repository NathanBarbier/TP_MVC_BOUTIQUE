<?php

class DisconnectController extends AbstractController
{
    public function action(array $data)
    {
        session_destroy();

        header('Location:?page=index&action=logIn');
    }
}
