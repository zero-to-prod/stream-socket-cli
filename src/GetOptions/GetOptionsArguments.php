<?php

namespace Zerotoprod\StreamSocketCli\GetOptions;

use Zerotoprod\DataModel\DataModel;

class GetOptionsArguments
{
    use DataModel;

    public const url = 'url';
    public string $url;
}