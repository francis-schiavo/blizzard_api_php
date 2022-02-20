<?php

namespace BlizzardApi\Enumerators;

enum EndpointNamespace: string
{
    case static = 'static-%s';
    case dynamic = 'dynamic-%s';
    case profile = 'profile-%s';
}