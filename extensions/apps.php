<?php

function _yearsSince($start = null, $end = null)
{
    if (!$start) {
        return null;
    }

    $now   = new DateTime();
    $start = new DateTime($start);
    if ($end) {
        $now = new DateTime($end);
    }
    $interval = $start->diff($now);

    if ($interval->y >= 1) {
        $result = $interval->y;
        $period = 'year';
    } elseif ($interval->m >= 1) {
        $result = $interval->m;
        $period = 'month';
    } elseif ($interval->d >= 1) {
        $result = $interval->d;
        $period = 'day';
    } else {
        return '?';
    }
    if ($result > 1) {
        $period .= '_plural';
    }

    return new \App\System\Application\Translation\TranslatableValue($period.'.nn', ['nn' => $result], 'time');
}
