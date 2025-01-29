<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\StreamSocketCli\RemoteSocketName\RemoteSocketNameArguments;
use Zerotoprod\StreamSocketCli\RemoteSocketName\RemoteSocketNameCommand;

class RemoteSocketNameCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new RemoteSocketNameCommand());
        $Command = $Application->find(RemoteSocketNameCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            RemoteSocketNameArguments::url => RemoteSocketNameArguments::url,
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}