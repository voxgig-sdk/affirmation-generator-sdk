<?php
declare(strict_types=1);

// AffirmationGenerator SDK utility: result_headers

class AffirmationGeneratorResultHeaders
{
    public static function call(AffirmationGeneratorContext $ctx): ?AffirmationGeneratorResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result) {
            if ($response && is_array($response->headers)) {
                $result->headers = $response->headers;
            } else {
                $result->headers = [];
            }
        }
        return $result;
    }
}
