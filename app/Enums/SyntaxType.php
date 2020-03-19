<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SyntaxType extends Enum
{
    const None =   0;
    const PHP =   1;
    const Python = 2;
    const CSharp = 3;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::None:
                return "";
                break;

            case self::CSharp:
                return "С#";
                break;
            
            default:
                return parent::getDescription($value);
                break;
        }
    }
}
