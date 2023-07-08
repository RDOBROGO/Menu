<?php

declare(strict_types=1);

namespace App;

class view
{
    public function render(array $render): void
    {
        require_once("templates/layout.php");
    }
}