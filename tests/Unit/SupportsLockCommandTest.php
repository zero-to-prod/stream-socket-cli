<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\StreamSocketCli\SupportsLock\SupportsLockArguments;
use Zerotoprod\StreamSocketCli\SupportsLock\SupportsLockCommand;

class SupportsLockCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new SupportsLockCommand());
        $Command = $Application->find(SupportsLockCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            SupportsLockArguments::url => SupportsLockArguments::url
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}