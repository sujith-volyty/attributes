<?php

namespace App\Remote\Button;

use App\Remote\ParentalControls;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;
use Symfony\Component\DependencyInjection\Attribute\AutowireServiceClosure;
use Symfony\Component\DependencyInjection\Attribute\Lazy;

#[AsTaggedItem('volume-up', priority: 20)]
final class VolumeUpButton implements ButtonInterface
{
    /**
     * @param \Closure():ParentalControls $parentalControls
     */
    public function __construct(
        #[AutowireServiceClosure(ParentalControls::class)]
        private \Closure $parentalControls,
    ) {
    }

    public function press(): void
    {
        if (true) {
            ($this->parentalControls)()->volumeTooHigh();
        }

        dump('Change the volume up');
    }
}
