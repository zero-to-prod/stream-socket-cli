<?php

namespace Zerotoprod\StreamSocketCli\GetParams;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/stream-socket-cli
 */
class GetParamsArguments
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