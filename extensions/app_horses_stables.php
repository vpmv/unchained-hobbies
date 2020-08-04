<?php

require_once 'apps.php';

class HorsesStables
{
    public static function transformYearsInBusiness(array $context)
    {
        return _yearsSince($context['date_founded'] ?? null, $context['date_closed'] ?? null);
    }
}
