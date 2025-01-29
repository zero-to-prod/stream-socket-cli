<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\StreamSocketCli\LocalSocketName\LocalSocketNameArguments;
use Zerotoprod\StreamSocketCli\LocalSocketName\LocalSocketNameCommand;

class LocalSocketnameCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new LocalSocketNameCommand());
        $Command = $Application->find(LocalSocketNameCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            LocalSocketNameArguments::url => LocalSocketNameArguments::url,
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}