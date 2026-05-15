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
            "auth": {
                "prefix": "Bearer",
            },
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
            "name": "affirmation",
            "req": True,
            "type": "`$STRING`",
            "active": True,
            "index$": 0,
          },
        ],
        "name": "get_random_affirmation",
        "op": {
          "load": {
            "name": "load",
            "points": [
              {
                "method": "GET",
                "orig": "/",
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "active": True,
                "parts": [],
                "args": {},
                "select": {},
                "index$": 0,
              },
            ],
            "input": "data",
            "key$": "load",
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
    },
    }
