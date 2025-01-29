<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\StreamSocketCli\SendTo\SendToArguments;
use Zerotoprod\StreamSocketCli\SendTo\SendToCommand;

class SendToCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new SendToCommand());
        $Command = $Application->find(SendToCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            SendToArguments::url => SendToArguments::url,
            SendToArguments::data => SendToArguments::data
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}