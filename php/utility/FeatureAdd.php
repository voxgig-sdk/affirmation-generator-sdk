<?php
declare(strict_types=1);

// AffirmationGenerator SDK utility: feature_add

class AffirmationGeneratorFeatureAdd
{
    public static function call(AffirmationGeneratorContext $ctx, mixed $f): void
    {
        $ctx->client->features[] = $f;
    }
}
