<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->exclude('bootstrap')
    ->exclude('storage')
    ->in(__DIR__);

$config = new Config();
$config->setRules([
    '@PSR2' => true,
    'array_indentation' => true,
    'array_syntax' => ['syntax' => 'short']
])
    ->setLineEnding("\n")
    ->setFinder($finder);

return $config;
