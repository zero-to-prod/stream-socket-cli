<?php

namespace Zerotoprod\StreamSocketCli\SendTo;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/stream-socket-cli
 */
class SendToArguments
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

    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public const data = 'data';
    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public string $data;
}