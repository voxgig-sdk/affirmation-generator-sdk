<?php
declare(strict_types=1);

// AffirmationGenerator SDK utility: make_context

require_once __DIR__ . '/../core/Context.php';

class AffirmationGeneratorMakeContext
{
    public static function call(array $ctxmap, ?AffirmationGeneratorContext $basectx): AffirmationGeneratorContext
    {
        return new AffirmationGeneratorContext($ctxmap, $basectx);
    }
}
