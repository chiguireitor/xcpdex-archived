<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Date / Block Index</th>
            <th>Asset 1</th>
            <th>Asset 2</th>
            <th>Unit Price</th>
        </tr>
    </thead>
    <tbody>
    @if ( count($matches) )
        @foreach( $matches as $result )
            @include('partials.matches-row', ['result' => $result])
        @endforeach
    @endif
    </tbody>
</table>
</div>