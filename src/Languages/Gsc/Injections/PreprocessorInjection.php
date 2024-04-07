<?php

namespace Tempest\Highlight\Languages\Gsc\Injections;

use Tempest\Highlight\Highlighter;
use Tempest\Highlight\Injection;
use Tempest\Highlight\ParsedInjection;
use Tempest\Highlight\Tokens\Token;
use Tempest\Highlight\Tokens\TokenTypeEnum;

class PreprocessorInjection implements Injection
{
    public function parse(string $content, Highlighter $highlighter): ParsedInjection
    {
        $tokens = [];

        preg_match_all('/^[\s]*?#(?<match>[a-z]+)(?<exp>[^\n;]*)/m', $content, $preprocessorMatches, PREG_OFFSET_CAPTURE);

        foreach ($preprocessorMatches[0] as $key => $matchedPreprocessor) {
            $tokens[] = new Token(
                offset: $preprocessorMatches['match'][$key][1],
                value: $preprocessorMatches['match'][$key][0],
                type: TokenTypeEnum::KEYWORD
            );

            if ($preprocessorMatches['exp'][$key] !== '') {
                $tokens[] = new Token(
                    offset: $preprocessorMatches['exp'][$key][1],
                    value: $preprocessorMatches['exp'][$key][0],
                    type: TokenTypeEnum::VALUE
                );
            }
        }

        return new ParsedInjection(
            content: $content,
            tokens: $tokens
        );
    }
}