<?php

namespace BlizzardApi\Enumerators;

enum PvpBracket: string
{
    case x2 = '2v2';
    case x3 = '3v3';
    case x5 = '5v5';
    case rbg = 'rbg';
}
