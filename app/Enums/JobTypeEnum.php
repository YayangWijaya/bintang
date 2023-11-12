<?php

namespace App\Enums;

enum JobTypeEnum: int
{
    case FULLTIME = 1;
    case PARTTIME = 2;
    case INTERNSHIP = 3;
    case FREELANCE = 4;

    public function name(): string
    {
        return match ($this) {
            JobTypeEnum::FULLTIME => 'Full-Time',
            JobTypeEnum::PARTTIME => 'Part-Time',
            JobTypeEnum::INTERNSHIP => 'Internship',
            JobTypeEnum::FREELANCE => 'Freelance',
        };
    }
}
