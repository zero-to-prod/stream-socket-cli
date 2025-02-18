<?php

namespace Zerotoprod\StreamSocketCli\SendTo;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/stream-socket-cli
 */
class SendToOptions
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public const flags = 'flags';
    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public int $flags = 0;

    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public const address = 'address';
    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public string $address = '';
}