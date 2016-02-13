
<tr>
    <td><a href="{{ url(route('asset', ['asset' => $result['asset']])) }}">{{ $result['asset'] }}</a></td>
    <td>{{ round($result['price_in_xcp'], 8) }}</td>
    <td><a href="https://counterpartychain.io/asset/{{ $result['asset'] }}" target="_blank">{{ number_format($result['total_supply']) }}</a></td>
    <td>{{ number_format(round(($result['price_in_xcp'] * $result['total_supply']), 4)) }}</td>
</tr>