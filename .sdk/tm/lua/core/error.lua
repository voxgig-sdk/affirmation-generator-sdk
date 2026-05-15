-- AffirmationGenerator SDK error

local AffirmationGeneratorError = {}
AffirmationGeneratorError.__index = AffirmationGeneratorError


function AffirmationGeneratorError.new(code, msg, ctx)
  local self = setmetatable({}, AffirmationGeneratorError)
  self.is_sdk_error = true
  self.sdk = "AffirmationGenerator"
  self.code = code or ""
  self.msg = msg or ""
  self.ctx = ctx
  self.result = nil
  self.spec = nil
  return self
end


function AffirmationGeneratorError:error()
  return self.msg
end


function AffirmationGeneratorError:__tostring()
  return self.msg
end


return AffirmationGeneratorError
