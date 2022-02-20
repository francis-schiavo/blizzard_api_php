<?php

namespace BlizzardApi\Enumerators;

enum OAuth2Scope: string {
    case WoWProfile = 'Wow.profile';
    case SC2Profile = 'sc2.profile';
}