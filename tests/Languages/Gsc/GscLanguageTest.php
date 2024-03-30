<?php

declare(strict_types=1);

namespace Tempest\Highlight\Tests\Languages\Gsc;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tempest\Highlight\Highlighter;

class GscLanguageTest extends TestCase
{
    #[DataProvider('data')]
    public function test_highlight(string $content, string $expected): void
    {
        $highlighter = new Highlighter();

        $this->assertSame(
            $expected,
            $highlighter->parse($content, 'php'),
        );
    }

    // public static function data(): array
    // {
    //     return [
    //     ];
    // }
}
