# AffirmationGenerator SDK utility: transform_request
require_relative 'struct/voxgig_struct'
require_relative '../core/helpers'
module AffirmationGeneratorUtilities
  # `$action` selects the point (see MakePoint); it is never an API field, so
  # the body is a copy without it. The caller's hash is left untouched.
  def self.strip_action(reqdata)
    return reqdata unless reqdata.is_a?(Hash) && reqdata.key?("$action")
    reqdata.reject { |k, _| k == "$action" }
  end

  TransformRequest = ->(ctx) {
    spec = ctx.spec
    point = ctx.point
    spec.step = "reqform" if spec
    transform = AffirmationGeneratorHelpers.to_map(VoxgigStruct.getprop(point, "transform"))
    return AffirmationGeneratorUtilities.strip_action(ctx.reqdata) unless transform
    reqform = VoxgigStruct.getprop(transform, "req")
    return AffirmationGeneratorUtilities.strip_action(ctx.reqdata) unless reqform
    AffirmationGeneratorUtilities.strip_action(VoxgigStruct.transform({ "reqdata" => ctx.reqdata }, reqform))
  }
end
