<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenTypeEnum;

#[PatternTest(
    input: 
'foo()
{
    /#
        return 1;
    #/
}', 
    output: 
'/#
return 1;
#/'
)]
final readonly class MultilineDevBlockCommentPattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '/(?<match>\/\#(.|\n)*?\#\/)/m';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::COMMENT;
    }
}
