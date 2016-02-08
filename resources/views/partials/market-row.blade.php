<tr>
    <td><a href="{{ url(route('asset', ['asset' => $result['base_asset']])) }}">{{ $result['base_asset'] }}</a></td>
    <td>{{ $result['price'] }}</td>
    <td>{{ $result['progression'] }}%</td>
    <td>{{ $result['price_24h'] }}</td>
@if( $result['base_divisibility'] == 1 )
    <td>{{ unSatoshi($result['supply']) }}</td>
@else
    <td>{{ $result['supply'] }}</td>
@endif
    <td>{{ unSatoshi($result['volume']) }}</td>
</tr>