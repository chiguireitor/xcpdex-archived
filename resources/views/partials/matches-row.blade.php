<tr>
    <td><a href="http://blockscan.com/tx?block={{ $result['block_index'] }}" target="_blank">{{ fixTimestamp($result['block_time']) }}</a></td>
    <td>{{ $result['base_quantity_normalized'] }} <a href="{{ url(route('asset', ['asset' => $result['base_asset'] ])) }}">{{ $result['base_asset'] }}</a></td>
    <td>{{ $result['quote_quantity_normalized'] }} {{ $result['quote_asset'] }}</td>
    <td>1 {{ $result['quote_asset'] }} = {{ $result['unit_price_inverse'] }} <a href="{{ url(route('asset', ['asset' => $result['base_asset'] ])) }}">{{ $result['base_asset'] }}</a></td>
</tr>