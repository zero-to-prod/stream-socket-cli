<?php

namespace Zerotoprod\StreamSocketCli\SendTo;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\StreamSocket\StreamSocket;

#[AsCommand(
    name: SendToCommand::signature,
    description: 'Sends a message to a socket, whether it is connected or not'
)]
class SendToCommand extends Command
{
    public const signature = 'stream-socket-cli:send-to';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = SendToArguments::from($input->getArguments());

        $SocketClient = StreamSocket::client(
            $Args->url,
            30,
            STREAM_CLIENT_CONNECT,
            stream_context_create()
        );

        $Options = SendToOptions::from([$input->getOptions()]);

        $output->writeln(
            $SocketClient->sendto(
                $Args->data,
                $Options->flags,
                $Options->address
            )
        );

        $SocketClient->close();

        return Command::SUCCESS;
    }

    public function configure(): void
    {
        $this->addArgument(SendToArguments::url, InputArgument::REQUIRED, 'The URL to connect to');
        $this->addArgument(SendToArguments::data, InputArgument::REQUIRED, 'The data to be sent');
        $this->addOption(SendToOptions::flags, mode: InputOption::VALUE_OPTIONAL, description: 'The value of flags can be any combination of the following: STREAM_OO');
        $this->addOption(SendToOptions::address, mode: InputOption::VALUE_OPTIONAL, description: 'The address specified when the socket stream was created will be used unless an alternate address is specified in address. If specified, it must be in dotted quad (or [ipv6]) format');
    }
}