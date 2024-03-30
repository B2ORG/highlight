<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\Tokens\TokenTypeEnum;

final class KeywordPattern implements Pattern
{
    use IsPattern;

    public function __construct(private string $keyword)
    {
    }

    public function getPattern(): string
    {
        return "/\b(?<!#)(?<match>{$this->keyword})(\)|\;|\s|\()/";
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::KEYWORD;
    }
}
