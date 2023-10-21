<?php

namespace Domain\Tasks\DTO;

class TaskDTO
{
    /**
     * @param int|null $id
     * @param string $title
     * @param string $description
     * @param string $status
     * @param int $user_id
     */
    public function __construct(
        public readonly string   $title,
        public readonly string   $description,
        public readonly string   $status,
        public readonly int      $user_id,
        public readonly int|null $id = null,
    )
    {
    }

}
