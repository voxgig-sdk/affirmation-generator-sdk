# AffirmationGenerator SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/ratelimit_feature'
require_relative 'feature/retry_feature'
require_relative 'feature/test_feature'
require_relative 'feature/timeout_feature'


module AffirmationGeneratorFeatures
  def self.make_feature(name)
    case name
    when "base"
      AffirmationGeneratorBaseFeature.new
    when "ratelimit"
      AffirmationGeneratorRatelimitFeature.new
    when "retry"
      AffirmationGeneratorRetryFeature.new
    when "test"
      AffirmationGeneratorTestFeature.new
    when "timeout"
      AffirmationGeneratorTimeoutFeature.new
    else
      AffirmationGeneratorBaseFeature.new
    end
  end
end
