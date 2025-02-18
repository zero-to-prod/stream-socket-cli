<?php

namespace Zerotoprod\StreamSocketCli\LocalSocketName;

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
    name: LocalSocketNameCommand::signature,
    description: 'Returns the remote socket name. Example: ssl://google.com:443'
)]
class LocalSocketNameCommand extends Command
{
    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public const signature = 'stream-socket-cli:local-socket-name';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = LocalSocketNameArguments::from($input->getArguments());

        $SocketClient = StreamSocket::client(
            $Args->url,
            30,
            STREAM_CLIENT_CONNECT,
            stream_context_create()
        );

        $output->writeln($SocketClient->localSocketName());

        $SocketClient->close();

        return Command::SUCCESS;
    }

    /**
     * @link https://github.com/zero-to-prod/stream-socket-cli
     */
    public function configure(): void
    {
        $this->addArgument(LocalSocketNameArguments::url, InputArgument::REQUIRED, 'The URL to connect to');
    }
}