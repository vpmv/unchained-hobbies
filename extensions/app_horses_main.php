<?php

require_once 'apps.php';

class HorsesMain implements \App\System\Constructs\UserExtensionInterface
{
    public static function transformAge(array $context)
    {
        return _yearsSince($context['date_of_birth'] ?? null, $context['date_of_death'] ?? null);
    }

    public static function transformType(array $context)
    {
        if (empty($context['height'])) {
            return null;
        }

        $classification = [
            157 => 'horse',
            145 => 'e_pony',
            125 => 'd_pony',
            120 => 'c_pony',
            115 => 'b_pony',
            110 => 'a_pony',
        ];

        $result = 'miniature';
        foreach ($classification as $height => $class) {
            if ($context['height'] >= $height) {
                $result = $class;
                break;
            }
        }

        return new \App\System\Application\Translation\TranslatableUserOutput('horses_main', $result, []);
    }

    public static function transformStatus(array $context)
    {
        if (!empty($context['injured']) || !empty($context['date_of_death'])) {
            return false;
        }

        return true;
    }
}