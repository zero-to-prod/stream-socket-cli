<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\StreamSocketCli\GetOptions\GetOptionsArguments;
use Zerotoprod\StreamSocketCli\GetOptions\GetOptionsCommand;

class GetOptionsCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new GetOptionsCommand());
        $Command = $Application->find(GetOptionsCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            GetOptionsArguments::url => GetOptionsArguments::url,
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}