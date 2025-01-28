<?php

namespace Zerotoprod\StreamSocketCli;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\StreamSocket\StreamSocket;

#[AsCommand(
    name: GetOptionsCommand::signature,
    description: 'Retrieve options for a stream/ wrapper/ context'
)]
class GetOptionsCommand extends Command
{
    public const signature = 'stream-socket-cli:get-options';
    public const url = 'url';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $SocketClient = StreamSocket::client(
            $input->getArgument(self::url),
            30,
            STREAM_CLIENT_CONNECT,
            stream_context_create()
        );

        $output->writeln(json_encode($SocketClient->getOptions(), JSON_PRETTY_PRINT));
        $SocketClient->close();

        return Command::SUCCESS;
    }

    public function configure(): void
    {
        $this->addArgument(self::url, InputArgument::REQUIRED, 'The URL to connect to');
    }
}