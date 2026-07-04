# AffirmationGenerator SDK configuration


def make_config():
    return {
        "main": {
            "name": "AffirmationGenerator",
        },
        "feature": {
            "test": {
        "options": {
          "active": False,
        },
      },
        },
        "options": {
            "base": "https://www.affirmations.dev",
            "headers": {
        "content-type": "application/json",
      },
            "entity": {
                "get_random_affirmation": {},
            },
        },
        "entity": {
      "get_random_affirmation": {
        "fields": [
          {
            "active": True,
            "name": "affirmation",
            "req": True,
            "type": "`$STRING`",
            "index$": 0,
          },
        ],
        "name": "get_random_affirmation",
        "op": {
          "load": {
            "input": "data",
            "name": "load",
            "points": [
              {
                "active": True,
                "args": {},
                "method": "GET",
                "orig": "/",
                "parts": [],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "index$": 0,
              },
            ],
            "key$": "load",
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
    },
    }
