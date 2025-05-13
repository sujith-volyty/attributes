<?php

namespace App\Remote;

use Psr\Log\LoggerInterface;

final class LoggerRemote
{
    public function __construct(
        private LoggerInterface $logger,
        private ButtonRemote $inner,
    ) {
    }

    public function press(string $name): void
    {
        $this->logger->info('Pressing button {name}', ['name' => $name]);
        $this->inner->press($name);
    }

    public function buttons(): iterable
    {
        return $this->inner->buttons();
    }
}