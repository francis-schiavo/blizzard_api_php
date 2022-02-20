<?php

namespace BlizzardApi\Enumerators;

enum EndpointVersion: string
{
    case retail = '%s';
    case classic = 'classic-%s';
    case classic1x = 'classic1x-%s';
}