<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenTypeEnum;

#[PatternTest(input: 'foo(bar)', output: 'foo')]
final readonly class FunctionPattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '/\b(?<match>[\w]+)[\s]*\(/';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::TYPE;
    }
}
