-- AffirmationGenerator SDK exists test

local sdk = require("affirmation-generator_sdk")

describe("AffirmationGeneratorSDK", function()
  it("should create test SDK", function()
    local testsdk = sdk.test(nil, nil)
    assert.is_not_nil(testsdk)
  end)
end)
