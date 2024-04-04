<?php

namespace Tempest\Highlight\Languages\Gsc\Helpers;

class Debugger
{
    public static function savePattern(string $content, string $path): void
    {
        $fh = fopen($path . DIRECTORY_SEPARATOR . 'out.txt', 'w');
        try {
            fwrite($fh, $content);
        }
        catch (\Throwable) {

        }
        finally {
            fclose($fh);
        }
    }
}