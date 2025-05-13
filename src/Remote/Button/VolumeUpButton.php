<?php

namespace App\Remote\Button;

use App\Remote\ParentalControls;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;
use Symfony\Component\DependencyInjection\Attribute\Lazy;

#[AsTaggedItem('volume-up', priority: 20)]
final class VolumeUpButton implements ButtonInterface
{
    public function __construct(
        #[Lazy] private ParentalControls $parentalControls,
    ) {
    }

    public function press(): void
    {
        if (false) {
            $this->parentalControls->volumeTooHigh();
        }

        dump('Change the volume up');
    }
}
