<?php

namespace BlizzardApi\Enumerators;

enum BaseURL: string
{
    case game_data = 'https://%s.api.blizzard.com/data/%s';
    case community = 'https://%s.api.blizzard.com/%s';
    case profile = 'https://%s.api.blizzard.com/profile/%s';
    case user_profile = 'https://%s.api.blizzard.com/profile/user/%s';
    case media = 'https://%s.api.blizzard.com/data/%s/media';
    case search = 'https://%s.api.blizzard.com/data/%s/search';
    case oauth_auth = 'https://%s.battle.net/oauth/authorize';
    case oauth_token = 'https://%s.battle.net/oauth/token';
}