<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserLevel extends Enum
{
    const Familiares =   0;
    const Pedagógico =   1;
    const Administrativo = 2;
    const Gestores = 3;
}
