<table class="table table-hover">
    <thead>
        <tr>
            <th>Asset Name</th>
            <th>Last Price (XCP)</th>
            <th>24h Change</th>
            <th>24h High</th>
            <th>Supply</th>
            <th>Volume (XCP)</th>
        </tr>
    </thead>
    <tbody>
    @if ( $markets )
        @foreach($markets as $market)
            @include('partials.market-row', ['result' => $market])
        @endforeach
    @endif
    </tbody>
</table>