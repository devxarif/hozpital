@if ($paginator->hasPages())
    <nav class="pagination py-2 d-inline-block ">
        <div class="nav-links">
            @if ($paginator->onFirstPage())
                <span class="nav-not-selectable"><i class="icofont-thin-left"></i></span>
            @else
                <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="icofont-thin-left"></i></a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="nav-not-selectable">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-numbers current">{{ $page }}</span>
                        @else
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a class="page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="icofont-thin-right"></i></a>
            @else
                <span class="nav-not-selectable"><i class="icofont-thin-right"></i></span>
            @endif
        </div>
    </nav>
@endif
