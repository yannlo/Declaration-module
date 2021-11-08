<?php

namespace YannLo\Basic\Modules\Tools\Apps;

trait NameVerified
{
    protected function verfierName($name): void
    {
        if (strlen($name) < 3) {
            throw new \InvalidArgumentException('invalid first name size');
            return;
        }

        if (preg_match('/[a-zA-Z\ \-]+/', $name) <= 0) {
            throw new \InvalidArgumentException('invalid first name');
            return;
        }
    }
}
