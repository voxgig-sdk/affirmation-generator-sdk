# AffirmationGenerator SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/test_feature'


module AffirmationGeneratorFeatures
  def self.make_feature(name)
    case name
    when "base"
      AffirmationGeneratorBaseFeature.new
    when "test"
      AffirmationGeneratorTestFeature.new
    else
      AffirmationGeneratorBaseFeature.new
    end
  end
end
