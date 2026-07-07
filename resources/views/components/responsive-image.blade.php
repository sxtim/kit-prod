@if($src)
    @php
        $imgAttributes = $attributes->class([]);
    @endphp
    <picture class="responsive-picture">
        @if(isset($variants[\App\Services\ResponsiveImageService::VARIANT_MOBILE]))
            <source
                media="(max-width: 767px)"
                srcset="{{ $variants[\App\Services\ResponsiveImageService::VARIANT_MOBILE] }}"
                type="image/webp"
                @if($sizes) sizes="{{ $sizes }}" @endif
            >
        @endif
        @if(isset($variants[\App\Services\ResponsiveImageService::VARIANT_DESKTOP]))
            <source
                srcset="{{ $variants[\App\Services\ResponsiveImageService::VARIANT_DESKTOP] }}"
                type="image/webp"
                @if($sizes) sizes="{{ $sizes }}" @endif
            >
        @endif
        <img
            {{ $imgAttributes }}
            src="{{ $src }}"
            alt="{{ $alt }}"
            @if($width) width="{{ $width }}" @endif
            @if($height) height="{{ $height }}" @endif
            @if($loading) loading="{{ $loading }}" @endif
            decoding="{{ $decoding }}"
            @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
        >
    </picture>
@endif
