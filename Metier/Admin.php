<?php

namespace Metier;

class Admin
{
    private string $login;

    /**
     * @param string $login
     */
    function __construct(string $login) {
        $this->login = $login;
    }
}