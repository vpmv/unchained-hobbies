<?php


class LeisureCycling implements \App\System\Constructs\UserExtensionInterface
{
    use \App\System\Helpers\DateTransformerTrait;

    public static function transformSpeed(array $context)
    {
        $time = $context['time'];
        if ($time instanceof \DateTime) {
            $time = $time->format('H:i');
        }

        [$hours, $minutes] = explode(':', $time);
        $time = $hours + ($minutes / 60);

        return round($context['distance'] / $time, 1);
    }
}