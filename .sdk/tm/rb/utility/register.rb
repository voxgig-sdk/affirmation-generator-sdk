# AffirmationGenerator SDK utility registration
require_relative '../core/utility_type'
require_relative 'clean'
require_relative 'done'
require_relative 'make_error'
require_relative 'feature_add'
require_relative 'feature_hook'
require_relative 'feature_init'
require_relative 'fetcher'
require_relative 'make_fetch_def'
require_relative 'make_context'
require_relative 'make_options'
require_relative 'make_request'
require_relative 'make_response'
require_relative 'make_result'
require_relative 'make_point'
require_relative 'make_spec'
require_relative 'make_url'
require_relative 'param'
require_relative 'prepare_auth'
require_relative 'prepare_body'
require_relative 'prepare_headers'
require_relative 'prepare_method'
require_relative 'prepare_params'
require_relative 'prepare_path'
require_relative 'prepare_query'
require_relative 'result_basic'
require_relative 'result_body'
require_relative 'result_headers'
require_relative 'transform_request'
require_relative 'transform_response'

AffirmationGeneratorUtility.registrar = ->(u) {
  u.clean = AffirmationGeneratorUtilities::Clean
  u.done = AffirmationGeneratorUtilities::Done
  u.make_error = AffirmationGeneratorUtilities::MakeError
  u.feature_add = AffirmationGeneratorUtilities::FeatureAdd
  u.feature_hook = AffirmationGeneratorUtilities::FeatureHook
  u.feature_init = AffirmationGeneratorUtilities::FeatureInit
  u.fetcher = AffirmationGeneratorUtilities::Fetcher
  u.make_fetch_def = AffirmationGeneratorUtilities::MakeFetchDef
  u.make_context = AffirmationGeneratorUtilities::MakeContext
  u.make_options = AffirmationGeneratorUtilities::MakeOptions
  u.make_request = AffirmationGeneratorUtilities::MakeRequest
  u.make_response = AffirmationGeneratorUtilities::MakeResponse
  u.make_result = AffirmationGeneratorUtilities::MakeResult
  u.make_point = AffirmationGeneratorUtilities::MakePoint
  u.make_spec = AffirmationGeneratorUtilities::MakeSpec
  u.make_url = AffirmationGeneratorUtilities::MakeUrl
  u.param = AffirmationGeneratorUtilities::Param
  u.prepare_auth = AffirmationGeneratorUtilities::PrepareAuth
  u.prepare_body = AffirmationGeneratorUtilities::PrepareBody
  u.prepare_headers = AffirmationGeneratorUtilities::PrepareHeaders
  u.prepare_method = AffirmationGeneratorUtilities::PrepareMethod
  u.prepare_params = AffirmationGeneratorUtilities::PrepareParams
  u.prepare_path = AffirmationGeneratorUtilities::PreparePath
  u.prepare_query = AffirmationGeneratorUtilities::PrepareQuery
  u.result_basic = AffirmationGeneratorUtilities::ResultBasic
  u.result_body = AffirmationGeneratorUtilities::ResultBody
  u.result_headers = AffirmationGeneratorUtilities::ResultHeaders
  u.transform_request = AffirmationGeneratorUtilities::TransformRequest
  u.transform_response = AffirmationGeneratorUtilities::TransformResponse
}
