<nav aria-label="Pagination">
  <ul class="pagination">
    <li class="page-item {{ $response->offset == 0 ? 'disabled' : ''}}">
        <a class="page-link" href="?page={{($response->offset / $response->limit) - 1}}">Previous</a>
    </li>
    @foreach (range(0, ($response->total > $response->limit ? $response->total/$response->limit : 0)) as $page)
        @if ($loop->index > ($response->offset / $response->limit) - 10 &&
            $loop->index < ($response->offset / $response->limit) + 10)
            <li class="page-item {{ $loop->index == ($response->offset / $response->limit) ? 'active' : ''}}">
                <a class="page-link" href="?page={{$page}}">{{$page}}</a>
            </li>
        @endif
    @endforeach
    <li class="page-item {{ $response->offset + $response->limit > $response->total ? 'disabled' : ''}}">
        <a class="page-link" href="?page={{$response->offset + 1}}">
            Next
        </a>
    </li>
  </ul>
</nav>
Total: {{ $response->total }} | Offset: {{ $response->offset }} | PageSize: {{ $response->limit }}
