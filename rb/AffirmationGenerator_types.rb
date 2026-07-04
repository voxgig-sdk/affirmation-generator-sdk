# frozen_string_literal: true

# Typed models for the AffirmationGenerator SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Member types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Ruby types are unenforced; these YARD
# annotations document the shapes. Do not edit by hand.

# GetRandomAffirmation entity data model.
#
# @!attribute [rw] affirmation
#   @return [String]
GetRandomAffirmation = Struct.new(
  :affirmation,
  keyword_init: true
)

# Match filter for GetRandomAffirmation#load (any subset of GetRandomAffirmation fields).
#
# @!attribute [rw] affirmation
#   @return [String, nil]
GetRandomAffirmationLoadMatch = Struct.new(
  :affirmation,
  keyword_init: true
)

