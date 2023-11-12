<?php

namespace App\Enums;

enum UserRoleEnum: int
{
    case HRD = 0;
    case ADMIN_PSIKOTEST = 1;
    case ADMIN_FISIK = 2;
    case ADMIN_KESEHATAN = 3;

    public function name(): string
    {
        return match ($this) {
            UserRoleEnum::HRD => 'HRD',
            UserRoleEnum::ADMIN_PSIKOTEST => 'Admin Psikotest',
            UserRoleEnum::ADMIN_FISIK => 'Admin Fisik',
            UserRoleEnum::ADMIN_KESEHATAN => 'Admin Kesehatan',
        };
    }
}
