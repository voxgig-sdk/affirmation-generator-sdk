# AffirmationGenerator SDK utility: feature_add
module AffirmationGeneratorUtilities
  FeatureAdd = ->(ctx, f) {
    ctx.client.features << f
  }
end
