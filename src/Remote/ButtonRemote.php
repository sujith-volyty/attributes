<?php

namespace App\Remote;

use App\Remote\Button\ButtonInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireLocator;
use App\Remote\Button\PowerButton;
use App\Remote\Button\ChannelUpButton;
use App\Remote\Button\ChannelDownButton;
use App\Remote\Button\VolumeUpButton;
use App\Remote\Button\VolumeDownButton;

final class ButtonRemote
{
    public function __construct(
        #[AutowireLocator(ButtonInterface::class)]
        private ContainerInterface $container,
    ) {
    }

    public function press(string $name): void
    {
        $this->container->get($name)->press();
    }
}