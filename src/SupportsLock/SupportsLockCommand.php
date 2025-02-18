<?php

namespace Zerotoprod\StreamSocketCli\SupportsLock;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\StreamSocket\StreamSocket;

/**
 * @link https://github.com/zero-to-prod/stream-socket-cli
 */
#[AsCommand(
    name: SupportsLockCommand::signature,
    description: 'Tells whether the stream supports locking. Returns the url for true, otherwise null.'
)]
class SupportsLockCommand extends Command
{
    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public const signature = 'stream-socket-cli:supports-lock';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = SupportsLockArguments::from($input->getArguments());

        $SocketClient = StreamSocket::client(
            $Args->url,
            30,
            STREAM_CLIENT_CONNECT,
            stream_context_create()
        );

        $output->writeln($SocketClient->supportsLock() ? $Args->url : '');

        $SocketClient->close();

        return Command::SUCCESS;
    }

    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public function configure(): void
    {
        $this->addArgument(SupportsLockArguments::url, InputArgument::REQUIRED, 'The URL to connect to');
    }
}