<?php

namespace Zerotoprod\StreamSocketCli\DataModels;

use Zerotoprod\DataModel\DataModel;

class SendToOptions
{
    use DataModel;

    public const url = 'url';
    public string $url;

    public const data = 'data';
    public string $data;

    public const flags = 'flags';
    public int $flags = 0;

    public const address = 'address';
    public string $address = '';
}