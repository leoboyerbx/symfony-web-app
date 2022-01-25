<?php
namespace App\Twig;

use App\Converter\MarkdownConverter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MarkdownExtension extends AbstractExtension {
    public function __construct(
        public MarkdownConverter $converter
    ) {}

    public function getFilters(): array {
        return [
            new TwigFilter('markdown_to_html', [$this, 'toHtml'], ['is_safe' => ['html']])
        ];
    }
    public function toHtml(string $markdown): string {
        return $this->converter->toHtml($markdown);
    }
}
