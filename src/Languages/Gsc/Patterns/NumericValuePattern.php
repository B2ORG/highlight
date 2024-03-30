<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenTypeEnum;

#[PatternTest(input: 'foo = 10000;', output: '10000')]
#[PatternTest(input: 'foo = 10.5;', output: '10.5')]
#[PatternTest(input: 'foo(bar=30)', output: '30')]
#[PatternTest(input: 'foo = bar * 3.5 - 200', output: ['3.5', '200'])]
final readonly class NumericValuePattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return "/[\W](?<match>[-]?[0-9\.]+)/m";
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::VALUE;
    }
}
