<?php

function get_languages(){
    $languages = [
        'ar-AE' => 'Arabic',
        'cmn-CN' => 'Chinese (Mandarin)',
        'hr-HR' => 'Croatian (Croatia)',
        'cs-CZ' => 'Czech (Czech Republic)',
        'da-DK' => 'Danish (Denmark)',
        'nl-NL' => 'Dutch (Netherlands)',
        'en-US' => 'English (USA)',
        'et-EE' => 'Estonian (Estonia)',
        'fi-FI' => 'Finnish (Finland)',
        'fr-FR' => 'French (France)',
        'de-DE' => 'German (Germany)',
        'el-GR' => 'Greek (Greece)',
        'he-IL' => 'Hebrew (Israel)',
        'hi-IN' => 'Hindi (India)',
        'hu-HU' => 'Hungarian (Hungary)',
        'is-IS' => 'Icelandic (Iceland)',
        'id-ID' => 'Indonesian (Indonesia)',
        'it-IT' => 'Italian (Italy)',
        'ja-JP' => 'Japanese (Japan)',
        'kk-KZ' => 'Kazakh (Kazakhstan)',
        'ko-KR' => 'Korean (South Korea)',
        'lt-LT' => 'Lithuanian (Lithuania)',
        'ms-MY' => 'Malay (Malaysia)',
        'nb-NO' => 'Norwegian (Norway)',
        'pl-PL' => 'Polish (Poland)',
        'pt-BR' => 'Portuguese (Brazil)',
        'pt-PT' => 'Portuguese (Portugal)',
        'ro-RO' => 'Romanian (Romania)',
        'ru-RU' => 'Russian (Russia)',
        'sl-SI' => 'Slovenian (Slovenia)',
        'es-ES' => 'Spanish (Spain)',
        'sw-KE' => 'Swahili (Kenya)',
        'sv-SE' => 'Swedish (Sweden)',
        'tr-TR' => 'Turkish (Turkey)',
        'vi-VN' => 'Vietnamese (Vietnam)',
    ];
    
    return $languages;
}
function get_voice_tones(){
    $voice_tones = [
        'Professional' => 'Professional',
        'Funny' => 'Funny',
        'Casual' => 'Casual',
        'Excited' => 'Excited',
        'Witty' => 'Witty',
        'Sarcastic' => 'Sarcastic',
        'Feminine' => 'Feminine',
        'Masculine' => 'Masculine',
        'Bold' => 'Bold',
        'Dramatic' => 'Dramatic',
        'Grumpy' => 'Grumpy',
        'Secretive' => 'Secretive',
    ];
    
    return $voice_tones;
}