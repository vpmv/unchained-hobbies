<?php

require_once 'apps.php';

class HorsesRiders
{
    use \App\System\Helpers\DateTransformerTrait;

    public static function transformExperience(array $context)
    {
        $start = self::earliest($context['date_started'] ?? '', $context['date_first_lesson'] ?? '');
        $end = self::earliest($context['date_stopped'] ?? '', $context['date_last_lesson'] ?? '');

        return static::timeAgo($start, $end);
    }
}
