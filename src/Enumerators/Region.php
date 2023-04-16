<?php

namespace BlizzardApi\Enumerators;

enum Region: string
{
    case US = 'us';
    case EU = 'eu';
    case KO = 'ko';
    case TW = 'tw';

    /**
     * @return int
     */
    public function id(): int
    {
        return match ($this) {
            Region::US => 1,
            Region::EU => 2,
            default => 3,
        };
    }
}