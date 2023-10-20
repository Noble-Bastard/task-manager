<?php

namespace Domain\Tasks\DTO;

class TaskDTO
{
    /**
     * @param string $title
     * @param string $description
     * @param int $userId
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly int    $userId,
    )
    {}

}
