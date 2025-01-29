<?php

namespace Zerotoprod\StreamSocketCli\LocalSocketName;

use Zerotoprod\DataModel\DataModel;

class LocalSocketNameArguments
{
    use DataModel;

    public const url = 'url';
    public string $url;
}