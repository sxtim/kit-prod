<?php

namespace App\View\Components;

use App\Services\ResponsiveImageService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResponsiveImage extends Component
{
    public array $variants;

    public function __construct(
        public ?string $src,
        public string $alt = '',
        public ?string $sizes = null,
        public ?string $loading = null,
        public string $decoding = 'async',
        public ?string $fetchpriority = null,
        public ?int $width = null,
        public ?int $height = null,
    ) {
        $this->variants = app(ResponsiveImageService::class)->getExistingVariants($src);
    }

    public function render(): View|Closure|string
    {
        return view('components.responsive-image');
    }
}
