<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\StreamSocketCli\GetParams\GetParamsArguments;
use Zerotoprod\StreamSocketCli\GetParams\GetParamsCommand;

class GetParamsCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new GetParamsCommand());
        $Command = $Application->find(GetParamsCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            GetParamsArguments::url => GetParamsArguments::url,
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}