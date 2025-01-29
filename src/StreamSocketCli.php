<?php

namespace Zerotoprod\StreamSocketCli;

use Symfony\Component\Console\Application;
use Zerotoprod\StreamSocketCli\GetOptions\GetOptionsCommand;
use Zerotoprod\StreamSocketCli\LocalSocketName\LocalSocketNameCommand;
use Zerotoprod\StreamSocketCli\RemoteSocketName\RemoteSocketNameCommand;
use Zerotoprod\StreamSocketCli\SendTo\SendToCommand;
use Zerotoprod\StreamSocketCli\Src\SrcCommand;
use Zerotoprod\StreamSocketCli\SupportsLock\SupportsLockCommand;

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