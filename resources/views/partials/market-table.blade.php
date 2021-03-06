<div class="table-responsive">
<table class="table table-hover" id="markets">
    <thead>
        <tr>
            <th>Asset Name</th>
            <th>Supply</th>
            <th>Last Price</th>
            <th>24h Change</th>
            <th>24h High</th>
            <th>24h Volume</th>
        </tr>
    </thead>
    <tbody>
    @if ( $markets )
        <?php $sum = 0; ?>
        @foreach($markets as $market)
            <?php $sum = $sum + $market['volume'] ?>
            @include('partials.market-row', ['result' => $market])
        @endforeach
    @endif
    </tbody>
</table>
</div>

<hr />
<div>
    <h3>24h Volume Total: <small>{{ round(unSatoshi($sum ), 2) }} XCP</small></h3>
</div>
<hr />
<br />