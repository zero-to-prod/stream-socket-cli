<?php

namespace Zerotoprod\StreamSocketCli\GetOptions;

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

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = GetOptionsArguments::from($input->getArguments());

        $SocketClient = StreamSocket::client(
            address: $Args->url,
            timeout: 30,
            flags: STREAM_CLIENT_CONNECT,
            context: stream_context_create()
        );

        $output->writeln(json_encode($SocketClient->getOptions(), JSON_PRETTY_PRINT));

        $SocketClient->close();

        return Command::SUCCESS;
    }

    public function configure(): void
    {
        $this->addArgument(GetOptionsArguments::url, InputArgument::REQUIRED, 'The URL to connect to');
    }
}