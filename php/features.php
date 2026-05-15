<?php
declare(strict_types=1);

// AffirmationGenerator SDK feature factory

require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/feature/TestFeature.php';


class AffirmationGeneratorFeatures
{
    public static function make_feature(string $name)
    {
        switch ($name) {
            case "base":
                return new AffirmationGeneratorBaseFeature();
            case "test":
                return new AffirmationGeneratorTestFeature();
            default:
                return new AffirmationGeneratorBaseFeature();
        }
    }
}
