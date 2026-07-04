<?php
declare(strict_types=1);

// AffirmationGenerator SDK configuration

class AffirmationGeneratorConfig
{
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "AffirmationGenerator",
            ],
            "feature" => [
                "test" => [
          'options' => [
            'active' => false,
          ],
        ],
            ],
            "options" => [
                "base" => "https://www.affirmations.dev",
                "headers" => [
          'content-type' => 'application/json',
        ],
                "entity" => [
                    "get_random_affirmation" => [],
                ],
            ],
            "entity" => [
        'get_random_affirmation' => [
          'fields' => [
            [
              'active' => true,
              'name' => 'affirmation',
              'req' => true,
              'type' => '`$STRING`',
              'index$' => 0,
            ],
          ],
          'name' => 'get_random_affirmation',
          'op' => [
            'load' => [
              'input' => 'data',
              'name' => 'load',
              'points' => [
                [
                  'active' => true,
                  'args' => [],
                  'method' => 'GET',
                  'orig' => '/',
                  'parts' => [],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'index$' => 0,
                ],
              ],
              'key$' => 'load',
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
      ],
        ];
    }


    public static function make_feature(string $name)
    {
        require_once __DIR__ . '/features.php';
        return AffirmationGeneratorFeatures::make_feature($name);
    }
}
