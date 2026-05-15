<?php
declare(strict_types=1);

// AffirmationGenerator SDK utility registration

require_once __DIR__ . '/../core/UtilityType.php';
require_once __DIR__ . '/Clean.php';
require_once __DIR__ . '/Done.php';
require_once __DIR__ . '/MakeError.php';
require_once __DIR__ . '/FeatureAdd.php';
require_once __DIR__ . '/FeatureHook.php';
require_once __DIR__ . '/FeatureInit.php';
require_once __DIR__ . '/Fetcher.php';
require_once __DIR__ . '/MakeFetchDef.php';
require_once __DIR__ . '/MakeContext.php';
require_once __DIR__ . '/MakeOptions.php';
require_once __DIR__ . '/MakeRequest.php';
require_once __DIR__ . '/MakeResponse.php';
require_once __DIR__ . '/MakeResult.php';
require_once __DIR__ . '/MakePoint.php';
require_once __DIR__ . '/MakeSpec.php';
require_once __DIR__ . '/MakeUrl.php';
require_once __DIR__ . '/Param.php';
require_once __DIR__ . '/PrepareAuth.php';
require_once __DIR__ . '/PrepareBody.php';
require_once __DIR__ . '/PrepareHeaders.php';
require_once __DIR__ . '/PrepareMethod.php';
require_once __DIR__ . '/PrepareParams.php';
require_once __DIR__ . '/PreparePath.php';
require_once __DIR__ . '/PrepareQuery.php';
require_once __DIR__ . '/ResultBasic.php';
require_once __DIR__ . '/ResultBody.php';
require_once __DIR__ . '/ResultHeaders.php';
require_once __DIR__ . '/TransformRequest.php';
require_once __DIR__ . '/TransformResponse.php';

AffirmationGeneratorUtility::setRegistrar(function (AffirmationGeneratorUtility $u): void {
    $u->clean = [AffirmationGeneratorClean::class, 'call'];
    $u->done = [AffirmationGeneratorDone::class, 'call'];
    $u->make_error = [AffirmationGeneratorMakeError::class, 'call'];
    $u->feature_add = [AffirmationGeneratorFeatureAdd::class, 'call'];
    $u->feature_hook = [AffirmationGeneratorFeatureHook::class, 'call'];
    $u->feature_init = [AffirmationGeneratorFeatureInit::class, 'call'];
    $u->fetcher = [AffirmationGeneratorFetcher::class, 'call'];
    $u->make_fetch_def = [AffirmationGeneratorMakeFetchDef::class, 'call'];
    $u->make_context = [AffirmationGeneratorMakeContext::class, 'call'];
    $u->make_options = [AffirmationGeneratorMakeOptions::class, 'call'];
    $u->make_request = [AffirmationGeneratorMakeRequest::class, 'call'];
    $u->make_response = [AffirmationGeneratorMakeResponse::class, 'call'];
    $u->make_result = [AffirmationGeneratorMakeResult::class, 'call'];
    $u->make_point = [AffirmationGeneratorMakePoint::class, 'call'];
    $u->make_spec = [AffirmationGeneratorMakeSpec::class, 'call'];
    $u->make_url = [AffirmationGeneratorMakeUrl::class, 'call'];
    $u->param = [AffirmationGeneratorParam::class, 'call'];
    $u->prepare_auth = [AffirmationGeneratorPrepareAuth::class, 'call'];
    $u->prepare_body = [AffirmationGeneratorPrepareBody::class, 'call'];
    $u->prepare_headers = [AffirmationGeneratorPrepareHeaders::class, 'call'];
    $u->prepare_method = [AffirmationGeneratorPrepareMethod::class, 'call'];
    $u->prepare_params = [AffirmationGeneratorPrepareParams::class, 'call'];
    $u->prepare_path = [AffirmationGeneratorPreparePath::class, 'call'];
    $u->prepare_query = [AffirmationGeneratorPrepareQuery::class, 'call'];
    $u->result_basic = [AffirmationGeneratorResultBasic::class, 'call'];
    $u->result_body = [AffirmationGeneratorResultBody::class, 'call'];
    $u->result_headers = [AffirmationGeneratorResultHeaders::class, 'call'];
    $u->transform_request = [AffirmationGeneratorTransformRequest::class, 'call'];
    $u->transform_response = [AffirmationGeneratorTransformResponse::class, 'call'];
});
