<?php

namespace App\Enums;

enum RecordStatus: int
{
    case ERROR = -1;
    case DEFAULT = 0;
    case ACTIVE = 1;
    case DELETED = 2;
    case TEMP = 3;
    case DRAFTED = 4;
}
