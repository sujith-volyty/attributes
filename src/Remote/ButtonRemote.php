<?php

namespace App\Remote;

use App\Remote\Button\ButtonInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;
use App\Remote\Button\PowerButton;
use App\Remote\Button\ChannelUpButton;
use App\Remote\Button\ChannelDownButton;
use App\Remote\Button\VolumeUpButton;
use App\Remote\Button\VolumeDownButton;

final class ButtonRemote
{
    public function __construct(
        #[AutowireIterator(ButtonInterface::class, indexAttribute: 'key')]
        private iterable $buttons,
    ) {
    }

    public function press(string $name): void
    {
        foreach ($this->buttons as $key => $button) {
            if ($key === $name) {
                $button->press();
                return;
            }
        }
    }

    public function buttons(): array
    {
        $buttons = [];
        foreach ($this->buttons as $name => $button) {
            $buttons[] = $name;
        }
        return $buttons;
    }
}