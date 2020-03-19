<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ExpirationType extends Enum
{
    const Never =   0;
    const Min10 =   1;
    const Hour1 = 2;
    const Day1 = 3;
    const Week1 = 4;
    const Week2 = 5;
    const Month1 = 6;
    const Year1 = 7;
}
