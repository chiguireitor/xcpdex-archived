<tr>
@if($title == 'Sell')
    <td><a href="{{ url(route('order', ['buy' => $asset, 'buy_qty' => unSatoshi($result['amount']), 'sell' => 'XCP', 'sell_qty' => unSatoshi($result['total']) ])) }}">{{ $result['price'] }}</a></td>
@else
    <td><a href="{{ url(route('order', ['buy' => 'XCP', 'buy_qty' => unSatoshi($result['total']), 'sell' => $asset, 'sell_qty' => unSatoshi($result['amount']) ])) }}">{{ $result['price'] }}</a></td>
@endif
    <td>{{ unSatoshi($result['amount']) }}</td>
    <td>{{ unSatoshi($result['total']) }}</td>
    <td>{{ unSatoshi($sum) }}</td>
</tr>