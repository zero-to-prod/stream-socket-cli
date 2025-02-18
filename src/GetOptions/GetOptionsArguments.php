<?php

namespace Zerotoprod\StreamSocketCli\GetOptions;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/stream-socket-cli
 */
class GetOptionsArguments
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public const url = 'url';
    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public string $url;
}