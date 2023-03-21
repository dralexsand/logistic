<?php

use App\Models\SystemTranslation;
use App\Models\Translation;

function getSystemTranslations()
{
    $translationsData = SystemTranslation::all();

    $translations = [];

    foreach ($translationsData as $item) {
        $translations[$item->content] = $item->toArray();
    }

    return $translations;
}

function getTranslations()
{
    return Translation::all()->toArray();
}

function systr(string $key, string $lang = 'ru')
{
    $book = getSystemTranslations();
    return key_exists($key, $book) ? $book[$key][$lang] : $key;
}

function list_systr(string $lang = 'ru'): array
{
    $book = getSystemTranslations();
    $translations = [];

    foreach ($book as $item) {
        $translations[$item['content']] = $item[$lang];
    }

    return $translations;
}

function tr(string $key, string $lang = 'ru')
{
    $book = getTranslations();
    return in_array($key, $book) ? $book[$key][$lang] : $key;
}
