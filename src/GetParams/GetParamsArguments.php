<?php

namespace Zerotoprod\StreamSocketCli\GetParams;

use Zerotoprod\DataModel\DataModel;

class GetParamsArguments
{
    use DataModel;

    public const url = 'url';
    public string $url;
}