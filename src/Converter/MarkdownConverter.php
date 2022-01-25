<?php

namespace App\Converter;

use League\CommonMark\CommonMarkConverter;

final class MarkdownConverter {
    public function toHtml(string $content): string {
        $converter = new CommonMarkConverter([
//            'html_input' => 'strip',
        ]);
        $rendererContent = $converter->convert($content);
        return $rendererContent->getContent();
    }
}
