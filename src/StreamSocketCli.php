<?php

namespace Zerotoprod\StreamSocketCli;

use Symfony\Component\Console\Application;

class StreamSocketCli
{
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
        $Application->add(new RemoteSocketNameCommand());
        $Application->add(new LocalSocketNameCommand());
        $Application->add(new SendToCommand());
        $Application->add(new SupportsLockCommand());
        $Application->add(new GetOptionsCommand());
    }
}