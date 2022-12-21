<?php

namespace metier;

class Admin
{
    private string $login;

    /**
     * @param string $login
     */
    function __construct(string $login) {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

}