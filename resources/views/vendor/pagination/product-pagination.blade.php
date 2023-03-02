@if ($paginator->hasPages())
    <ul class="pagination flex flex-wrap items-center justify-center">
        @if ($paginator->onFirstPage())
            <li class="mx-2">
                <button disabled type="button" class="cursor-not-allowed flex flex-wrap rounded-md items-center justify-center  w-11 h-11 bg-white shadow text-orange leading-none transition-all hover:bg-blue-500 hover:text-white" href="javascript:void(0)">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd"></path>
                      </svg>
                </button>
            </li>
        @else
            <li class="mx-2">
                <a href="{{ $paginator->previousPageUrl() }}" class="flex flex-wrap rounded-md items-center justify-center  w-11 h-11 bg-white shadow text-orange leading-none transition-all hover:bg-blue-500 hover:text-white">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="mx-2">
                            <a class="flex flex-wrap rounded-md items-center justify-center w-11 h-11 bg-blue-500 shadow text-white leading-none transition-all" href="javascript:void(0)">{{ $page }}</a>
                        </li>
                    @else
                        <li class="mx-2">
                            <a href="{{ $url }}" class="flex flex-wrap rounded-md items-center justify-center  w-11 h-11 bg-white shadow text-orange leading-none transition-all hover:bg-blue-500 hover:text-white active">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="mx-2">
                <a href="{{ $paginator->nextPageUrl() }}" class="flex flex-wrap rounded-md items-center justify-center  w-11 h-11 bg-white shadow text-orange leading-none transition-all hover:bg-blue-500 hover:text-white">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                      </svg>
                </a>
            </li>
        @else
            <li class="mx-2">
                <button disabled type="button" class="cursor-not-allowed flex flex-wrap rounded-md items-center justify-center  w-11 h-11 bg-white shadow text-orange leading-none transition-all hover:bg-blue-500 hover:text-white">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
        @endif
    </ul>
@endif
