

@if (isset($paginator) && $paginator->lastPage() > 1)
    <!--pagination-->
    <div class="pagination">
        <div class="pagination-area">
            <div class="pagination-list">
                <ul class="list-inline">
                    @php
                        $interval = isset($interval) ? abs(intval($interval)) : 3;
                        $from = $paginator->currentPage() - $interval;
                        if ($from < 1) {
                            $from = 1;
                        }
                        
                        $to = $paginator->currentPage() + $interval;
                        if ($to > $paginator->lastPage()) {
                            $to = $paginator->lastPage();
                        }
                    @endphp
                    <!-- first/previous -->
                    @if ($paginator->currentPage() > 1)
                        <li><a href="{{ $paginator->url($paginator->currentPage() - 1) }}"><i
                                    class="las la-arrow-left"></i></a></li>
                    @endif
                    <!-- links -->
                    @for ($i = $from; $i <= $to; $i++)
                        @php
                            $isCurrentPage = $paginator->currentPage() == $i;
                        @endphp
                        <li>
                            <a class="{{ $isCurrentPage ? 'active' : '' }}" href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
                    <!-- next/last -->
                    @if ($paginator->currentPage() < $paginator->lastPage())
                        <li><a href="{{ $paginator->url($paginator->currentPage() + 1) }}"><i
                                    class="las la-arrow-right"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
