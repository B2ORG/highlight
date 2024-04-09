<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenTypeEnum;

#[PatternTest(input: 'foo\bar::baz()', output: 'baz')]
final readonly class FunctionPathPattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '/(?<match>::\w+)/';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::TYPE;
    }
}
