# AffirmationGenerator SDK exists test

require "minitest/autorun"
require_relative "../AffirmationGenerator_sdk"

class ExistsTest < Minitest::Test
  def test_create_test_sdk
    testsdk = AffirmationGeneratorSDK.test(nil, nil)
    assert !testsdk.nil?
  end
end
