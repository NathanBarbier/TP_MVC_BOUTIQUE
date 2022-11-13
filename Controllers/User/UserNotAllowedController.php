<?php

class UserNotAllowedController extends AbstractController
{
    public function action(array $data): false|string
    {
        ob_start();

        require_once RouteEnum::USER_NOT_ALLOWED->value;

        return ob_get_clean();
    }
}
