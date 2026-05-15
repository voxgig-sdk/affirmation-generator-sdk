<?php
declare(strict_types=1);

// AffirmationGenerator SDK utility: prepare_body

class AffirmationGeneratorPrepareBody
{
    public static function call(AffirmationGeneratorContext $ctx): mixed
    {
        if ($ctx->op->input === 'data') {
            return ($ctx->utility->transform_request)($ctx);
        }
        return null;
    }
}
