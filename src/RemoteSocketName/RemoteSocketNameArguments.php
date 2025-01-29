<?php

namespace Zerotoprod\StreamSocketCli\RemoteSocketName;

use Zerotoprod\DataModel\DataModel;

class RemoteSocketNameArguments
{
    use DataModel;

    public const url = 'url';
    public string $url;
}