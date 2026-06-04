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
              'name' => 'affirmation',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
          ],
          'name' => 'get_random_affirmation',
          'op' => [
            'load' => [
              'name' => 'load',
              'points' => [
                [
                  'method' => 'GET',
                  'orig' => '/',
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'parts' => [],
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
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
