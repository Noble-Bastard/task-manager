<?php

namespace Domain\Tasks\Enums;
enum TaskStatusEnum: string
{
    case COMPLETED = 'completed';
    case TODO = 'todo';

    public static function values(): array
    {
        return [
            self::COMPLETED->value,
            self::TODO->value,
        ];
    }


}
