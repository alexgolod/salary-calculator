<?php
declare(strict_types=1);

namespace App\Type;


use MyCLabs\Enum\Enum;

/**
 * Class CountryEnum
 *
 * @method static \App\Type\CountryEnum Fillory
 * @method static \App\Type\CountryEnum Mordor
 * @package App\Type
 */
class CountryEnum extends Enum
{

    public const Fillory = 1;

    public const Mordor = 2;

    public static function castValueIn($value)
    {
        return (int)$value;
    }
}
