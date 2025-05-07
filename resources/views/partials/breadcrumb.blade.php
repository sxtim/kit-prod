@unless ($breadcrumbs->isEmpty())
    <nav class="nav-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if(!$loop->last)
                        <li><a href="{{$breadcrumb->url}}">{{$breadcrumb->title}}</a></li>
                    @else
                        <li>{{$breadcrumb->title}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
@endunless