<?php

namespace Zerotoprod\StreamSocketCli\SendTo;

use Zerotoprod\DataModel\DataModel;

class SendToArguments
{
    use DataModel;

    public const url = 'url';
    public string $url;

    public const data = 'data';
    public string $data;
}