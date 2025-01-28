<?php

namespace Zerotoprod\StreamSocketCli;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\StreamSocket\StreamSocket;

#[AsCommand(
    name: RemoteSocketNameCommand::signature,
    description: 'Returns the remote socket name. Example: ssl://google.com:443'
)]
class RemoteSocketNameCommand extends Command
{
    public const signature = 'stream-socket-cli:remote-socket-name';
    public const url = 'url';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $SocketClient = StreamSocket::client(
            $input->getArgument(self::url),
            30,
            STREAM_CLIENT_CONNECT,
            stream_context_create()
        );

        $output->writeln($SocketClient->remoteSocketName());
        $SocketClient->close();

        return Command::SUCCESS;
    }

    public function configure(): void
    {
        $this->addArgument(self::url, InputArgument::REQUIRED, 'The URL to connect to');
    }
}