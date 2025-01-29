<?php

namespace Zerotoprod\StreamSocketCli\SupportsLock;

use Zerotoprod\DataModel\DataModel;

class SupportsLockArguments
{
    use DataModel;

    public const url = 'url';
    public string $url;
}