<?php

namespace Zerotoprod\:namespace;

use Symfony\Component\Console\Application;

class :namespace
{
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
    }
}