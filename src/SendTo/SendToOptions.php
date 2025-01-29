<?php

namespace Zerotoprod\StreamSocketCli\SendTo;

use Zerotoprod\DataModel\DataModel;

class SendToOptions
{
    use DataModel;

    public const flags = 'flags';
    public int $flags = 0;

    public const address = 'address';
    public string $address = '';
}