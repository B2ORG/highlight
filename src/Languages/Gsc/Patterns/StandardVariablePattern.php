<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\Tokens\TokenTypeEnum;

final class StandardVariablePattern implements Pattern
{
    use IsPattern;

    public function __construct(private string $stdVar)
    {

    }

    public function getPattern(): string
    {
        return '/[^\w](?<match>' . $this->stdVar . ')[^\w]/m';
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::VARIABLE;
    }
}
