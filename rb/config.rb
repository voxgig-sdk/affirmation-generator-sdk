# AffirmationGenerator SDK configuration

module AffirmationGeneratorConfig
  def self.make_config
    {
      "main" => {
        "name" => "AffirmationGenerator",
      },
      "feature" => {
        "test" => {
          "options" => {
            "active" => false,
          },
        },
      },
      "options" => {
        "base" => "https://www.affirmations.dev",
        "headers" => {
          "content-type" => "application/json",
        },
        "entity" => {
          "get_random_affirmation" => {},
        },
      },
      "entity" => {
        "get_random_affirmation" => {
          "fields" => [
            {
              "name" => "affirmation",
              "req" => true,
              "type" => "`$STRING`",
              "active" => true,
              "index$" => 0,
            },
          ],
          "name" => "get_random_affirmation",
          "op" => {
            "load" => {
              "name" => "load",
              "points" => [
                {
                  "method" => "GET",
                  "orig" => "/",
                  "transform" => {
                    "req" => "`reqdata`",
                    "res" => "`body`",
                  },
                  "active" => true,
                  "parts" => [],
                  "args" => {},
                  "select" => {},
                  "index$" => 0,
                },
              ],
              "input" => "data",
              "key$" => "load",
            },
          },
          "relations" => {
            "ancestors" => [],
          },
        },
      },
    }
  end


  def self.make_feature(name)
    require_relative 'features'
    AffirmationGeneratorFeatures.make_feature(name)
  end
end
