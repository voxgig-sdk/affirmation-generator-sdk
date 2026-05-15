<?php
declare(strict_types=1);

// AffirmationGenerator SDK utility: result_body

class AffirmationGeneratorResultBody
{
    public static function call(AffirmationGeneratorContext $ctx): ?AffirmationGeneratorResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result && $response && $response->json_func && $response->body) {
            $result->body = ($response->json_func)();
        }
        return $result;
    }
}
