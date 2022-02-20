<?php

namespace BlizzardApi\Enumerators;

enum Game: string
{
    case None = '';
    case WoW = 'wow';
    case D3 = 'd3';
    case SC2 = 'sc2';
    case HS = 'hearthstone';
}