<tr>
    <td><a href="{{ url(route('asset', ['asset' => $result['base_asset']])) }}">{{ $result['base_asset'] }}</a></td>
@if( $result['base_divisibility'] == 1 )
    <td><a href="https://counterpartychain.io/asset/{{ $result['base_asset'] }}" target="_blank">{{ number_format(unSatoshi($result['supply'])) }}</a></td>
@else
    <td><a href="https://counterpartychain.io/asset/{{ $result['base_asset'] }}" target="_blank">{{ number_format($result['supply']) }}</a></td>
@endif
    <td>{{ round($result['price'], 4) }} XCP</td>
    <td class="{{ ( $result['progression'] < 0 ) ? 'text-danger' : 'text-success' }}">{{ $result['progression'] }}%</td>
    <td>{{ round($result['price_24h'], 4) }}</td>
    <td>{{ unSatoshi($result['volume']) }} XCP</td>
</tr>