<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Gsc;

use Tempest\Highlight\Languages\Base\BaseLanguage;
use Tempest\Highlight\Languages\Gsc\Injections\PreprocessorInjection;
use Tempest\Highlight\Languages\Gsc\Patterns\ConstVariablePattern;
use Tempest\Highlight\Languages\Gsc\Patterns\FunctionPathPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\FunctionPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\FunctionRefPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\KeywordPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\MultilineDevBlockCommentPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\MultilineSingleDocCommentPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\NumericValuePattern;
use Tempest\Highlight\Languages\Gsc\Patterns\OperatorPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\SinglelineCommentPattern;
use Tempest\Highlight\Languages\Gsc\Patterns\StandardVariablePattern;
use Tempest\Highlight\Languages\Gsc\Patterns\StringValuePattern;
use Tempest\Highlight\Languages\Gsc\Patterns\StructPropertyPattern;

class GscLanguage extends BaseLanguage
{
    public function getInjections(): array
    {
        return [
            ...parent::getInjections(),

            new PreprocessorInjection(),
        ];
    }

    public function getPatterns(): array
    {
        return [
            ...parent::getPatterns(),

            // OPERATORS
            new OperatorPattern('+='),
            new OperatorPattern('-='),
            new OperatorPattern('*='),
            new OperatorPattern('%'),
            new OperatorPattern('/'),
            new OperatorPattern('*'),
            new OperatorPattern('=', occurances: 2),
            new OperatorPattern('!='),
            new OperatorPattern('+', occurances: 3),
            new OperatorPattern('-', occurances: 3),
            new OperatorPattern('|', occurances: 2),
            new OperatorPattern('&', occurances: 2),
            new OperatorPattern('<='),
            new OperatorPattern('<'),
            new OperatorPattern('>='),
            new OperatorPattern('>'),
            new OperatorPattern('!'),
            new OperatorPattern(':', occurances: 2),

            // KEYWORDS
            new KeywordPattern('break'),
            new KeywordPattern('case'),
            new KeywordPattern('continue'),
            new KeywordPattern('default'),
            new KeywordPattern('else'),
            new KeywordPattern('endon'),
            new KeywordPattern('for'),
            new KeywordPattern('foreach'),
            new KeywordPattern('if'),
            new KeywordPattern('in'),
            new KeywordPattern('implements'),
            // new KeywordPattern('namespace'),
            new KeywordPattern('notify'),
            new KeywordPattern('return'),
            new KeywordPattern('switch'),
            new KeywordPattern('thread'),
            new KeywordPattern('wait'),
            new KeywordPattern('waittill'),
            new KeywordPattern('waittillframeend'),
            new KeywordPattern('while'),

            // COMMENTS
            new MultilineSingleDocCommentPattern(),
            new MultilineDevBlockCommentPattern(),
            new SinglelineCommentPattern(),

            // GENERICS
            new ConstVariablePattern(pattern: 'true', nonWordEnding: true),
            new ConstVariablePattern(pattern: 'false', nonWordEnding: true),
            new ConstVariablePattern(pattern: 'undefined', nonWordEnding: true),
            // new ConstVariablePattern(),

            // TYPES
            new FunctionRefPattern(),
            new FunctionPathPattern(),
            new FunctionPattern(),

            // PROPERTIES
            /** @todo Not detected when used on function call, eg get_round_enemy_array().size */
            /** @todo Not detected when used on array with specified key, eg level.zombie_weapons[weapon].is_in_box */
            new StructPropertyPattern(),

            // VARIABLES
            new StandardVariablePattern('player'),
            new StandardVariablePattern('self'),
            new StandardVariablePattern('level'),

            // VALUES
            new NumericValuePattern(),
            /** @todo if (isSubStr(key, "+")) + is detected as operator */
            new StringValuePattern(),
        ];
    }
}
