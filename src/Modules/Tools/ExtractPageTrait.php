<?php

namespace YannLo\Basic\Modules\Tools;

trait ExtractPageTrait
{
    private function extractPageOnRouteName(string $name): string
    {
        return substr($name, strpos($name, ".") + 1, strlen($name));
    }

    private function extractPageOnUri(string $name): string
    {
        return substr($name, 1, strlen($name));
    }
}
