<?php
    function get_months_arr(array $translations, string $locale = 'en') {
        return $translations[$locale] ?? [];
    };
    function get_month(array $translations, string $locale = 'en', int $num = 1) {
        return $translations[$locale][$num - 1] ?? [];
    };