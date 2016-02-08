<table class="table table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Price</th>
            <th>{{ $asset }}</th>
            <th>XCP</th>
        </tr>
    </thead>
    <tbody>
    @if ( $orders )
        @foreach( $orders as $result )
            @include('partials.history-row', ['result' => $result])
        @endforeach
    @endif
    </tbody>
</table>