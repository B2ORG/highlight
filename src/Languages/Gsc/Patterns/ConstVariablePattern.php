<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\Tokens\TokenTypeEnum;

final class ConstVariablePattern implements Pattern
{
    use IsPattern;

    public function __construct(private ?string $pattern = null, private bool $nonWordEnding = false)
    {

    }

    public function getPattern(): string
    {
        $pattern = '/[^\w](?<match>'
                . ($this->pattern ?? '[A-Z][A-Z0-9_]+')
                . ')'
                . ($this->nonWordEnding ? '[^\w]' : '')
                . '/m';
        return $pattern;
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::GENERIC;
    }
}
