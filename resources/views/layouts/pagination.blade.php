
@if ($paginator->hasPages())
<nav aria-label="Page navigation example" class="mx-auto">
    <ul class="pagination justify-content-center pager">
    
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">← Inicio</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">← Voltar</a></li>
        @endif


    
        @foreach ($elements as $element)
        
            @if (is_string($element))
                <li class="page-item disabled"><span>{{ $element }}</span></li>
            @endif


        
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active my-active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Avançar →</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Ultimo →</span></li>
        @endif
    </ul>
</nav>
@endif 

