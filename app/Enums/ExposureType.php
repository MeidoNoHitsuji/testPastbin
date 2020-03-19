<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ExposureType extends Enum
{
    const Pub =   0;
    const Unlisted =   1;
    const Priv =   1;
}
