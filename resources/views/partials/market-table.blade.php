<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Asset Name</th>
            <th>Supply</th>
            <th>24h Volume</th>
            <th>Last Price</th>
            <th>24h Change</th>
            <th>24h High</th>
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
</div>