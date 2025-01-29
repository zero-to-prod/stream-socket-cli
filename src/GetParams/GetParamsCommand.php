<?php

namespace Zerotoprod\StreamSocketCli\GetParams;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\StreamSocket\StreamSocket;

#[AsCommand(
    name: GetParamsCommand::signature,
    description: 'Retrieve params for a stream/ wrapper/ context'
)]
class GetParamsCommand extends Command
{
    public const signature = 'stream-socket-cli:get-params';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = GetParamsArguments::from($input->getArguments());

        $SocketClient = StreamSocket::client(
            $Args->url,
            30,
            STREAM_CLIENT_CONNECT,
            stream_context_create()
        );

        $output->writeln(json_encode($SocketClient->getParams(), JSON_PRETTY_PRINT));

        $SocketClient->close();

        return Command::SUCCESS;
    }

    public function configure(): void
    {
        $this->addArgument(GetParamsArguments::url, InputArgument::REQUIRED, 'The URL to connect to');
    }
}