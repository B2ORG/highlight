<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenTypeEnum;

#[PatternTest(input: 'foo = "bar_" + "25";', output: ['bar_', '25'])]
final readonly class StringValuePattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '/"(?<match>.*?)"/m';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::VALUE;
    }
}
