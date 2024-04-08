<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenTypeEnum;

#[PatternTest(input: 'for (i=0; i<foo.bar.size; i++)', output: ['bar', 'size'])]
#[PatternTest(input: 'foo = bar.buzz', output: 'buzz')]
final readonly class StructPropertyPattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '/\.(?<match>[A-Za-z][\w]+)\b/';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::PROPERTY;
    }
}
