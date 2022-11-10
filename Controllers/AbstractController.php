<?php

abstract class AbstractController
{
    public function __toString() {
        return $this->action($this->getData());
    }

    public function getData() {
        return array_merge($_POST, $_GET);
    }
}

