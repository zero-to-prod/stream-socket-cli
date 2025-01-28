<?php

namespace Zerotoprod\StreamSocketCli;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\StreamSocket\StreamSocket;

#[AsCommand(
    name: SupportsLockCommand::signature,
    description: 'Tells whether the stream supports locking. Returns 1 for true and 0 for false.'
)]
class SupportsLockCommand extends Command
{
    public const signature = 'stream-socket-cli:supports-lock';
    public const url = 'url';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $SocketClient = StreamSocket::client(
            $input->getArgument(self::url),
            30,
            STREAM_CLIENT_CONNECT,
            stream_context_create()
        );

        $output->writeln($SocketClient->supportsLock() ? 1 : 0);
        $SocketClient->close();

        return Command::SUCCESS;
    }

    public function configure(): void
    {
        $this->addArgument(self::url, InputArgument::REQUIRED, 'The URL to connect to');
    }
}