<?php
declare(strict_types=1);

// AffirmationGenerator SDK base feature

class AffirmationGeneratorBaseFeature
{
    public string $version;
    public string $name;
    public bool $active;

    public function __construct()
    {
        $this->version = '0.0.1';
        $this->name = 'base';
        $this->active = true;
    }

    public function get_version(): string { return $this->version; }
    public function get_name(): string { return $this->name; }
    public function get_active(): bool { return $this->active; }

    public function init(AffirmationGeneratorContext $ctx, array $options): void {}
    public function PostConstruct(AffirmationGeneratorContext $ctx): void {}
    public function PostConstructEntity(AffirmationGeneratorContext $ctx): void {}
    public function SetData(AffirmationGeneratorContext $ctx): void {}
    public function GetData(AffirmationGeneratorContext $ctx): void {}
    public function GetMatch(AffirmationGeneratorContext $ctx): void {}
    public function SetMatch(AffirmationGeneratorContext $ctx): void {}
    public function PrePoint(AffirmationGeneratorContext $ctx): void {}
    public function PreSpec(AffirmationGeneratorContext $ctx): void {}
    public function PreRequest(AffirmationGeneratorContext $ctx): void {}
    public function PreResponse(AffirmationGeneratorContext $ctx): void {}
    public function PreResult(AffirmationGeneratorContext $ctx): void {}
    public function PreDone(AffirmationGeneratorContext $ctx): void {}
    public function PreUnexpected(AffirmationGeneratorContext $ctx): void {}
}
