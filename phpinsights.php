<?php

return [
    'default',

    'exclude' => [
        'vendor',
        'config',
        'bootstrap',
        'resources',
        'storage',
        'public',
        'tests',
    ],

    'add' => [

    ],

    'remove' => [
        ForbiddenTraits::class,
        TypeHintDeclarationSniff::class,
        DisallowMixedTypeHintSniff::class,
        ComposerMustBeValid::class,
        AlphabeticallySortedUsesSniff::class,
        CamelCapsMethodNameSniff::class,
        LineLengthSniff::class,
    ],

    'config' => [
        CyclomaticComplexityIsHigh::class => [
            'maxComplexity' => 7,
        ],

        FunctionLengthSniff::class => [
            'maxLength' => 30,
        ],

        MethodPerClassLimitSniff::class => [
            'maxCount' => 12,
        ],
    ],
];
