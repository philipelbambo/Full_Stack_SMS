<?php

namespace App\Services;

class GradeService
{
    public function percentageToGpa($percentage): float
    {
        if ($percentage >= 97) return 1.0;
        if ($percentage >= 94) return 1.25;
        if ($percentage >= 91) return 1.5;
        if ($percentage >= 88) return 1.75;
        if ($percentage >= 85) return 2.0;
        if ($percentage >= 82) return 2.25;
        if ($percentage >= 79) return 2.5;
        if ($percentage >= 76) return 2.75;
        if ($percentage == 75) return 3.0;

        return 5.0;
    }
}
