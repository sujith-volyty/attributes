<?php

namespace App\Remote;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\DependencyInjection\Attribute\Target;

#[AsDecorator(ButtonRemote::class)]
final class LoggerRemote implements RemoteInterface
{
    public function __construct(
        #[Target('buttonLogger')]
        private LoggerInterface $anyvarLogger,
        private RemoteInterface $inner,
    ) {
    }

    public function press(string $name): void
    {
        $this->anyvarLogger->info('Pressing button {name}', ['name' => $name]);
        $this->inner->press($name);
    }

    public function buttons(): iterable
    {
        return $this->inner->buttons();
    }
}