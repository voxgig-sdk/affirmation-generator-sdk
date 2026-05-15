# AffirmationGenerator SDK utility: make_context
require_relative '../core/context'
module AffirmationGeneratorUtilities
  MakeContext = ->(ctxmap, basectx) {
    AffirmationGeneratorContext.new(ctxmap, basectx)
  }
end
