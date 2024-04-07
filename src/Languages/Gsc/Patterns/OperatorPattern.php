<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\Tokens\TokenTypeEnum;

final class OperatorPattern implements Pattern
{
    use IsPattern;

    public function __construct(private string $operator, private int $occurances = 1, private bool $literal = false)
    {

    }

    public function getPattern(): string
    {
        return match ($this->occurances) {
            1, 2 => '(?<match>' . str_repeat($this->escapeOperators(), $this->occurances) . ')',
            3 => '(?<match>[' . $this->escapeOperators() . ']{1,2})',
        };
    }

    public function getTokenType(): TokenTypeEnum
    {
        return TokenTypeEnum::OPERATOR;
    }

    private function escapeOperators(): string
    {
        if ($this->literal) {
            return $this->operator;
        }

        $escaped = '';
        foreach (str_split($this->operator) as $char) {
            $escaped .= '\\' . $char;
        }
        return $escaped;
    }
}
