<?php

require_once 'apps.php';

class HorsesRiders
{
    public static function transformExperience(array $context)
    {
        return _yearsSince($context['date_started'] ?? null, $context['date_stopped'] ?? null);
    }
}
