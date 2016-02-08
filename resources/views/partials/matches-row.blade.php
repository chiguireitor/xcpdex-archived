<tr>
    <td><a href="http://blockscan.com/tx?block={{ $result['block_index'] }}" target="_blank">{{ fixTimestamp($result['block_time']) }}</a></td>
    <td>{{ $result['base_quantity_normalized'] }} {{ $result['base_asset'] }}</td>
    <td>{{ $result['quote_quantity_normalized'] }} {{ $result['quote_asset'] }}</td>
    <td>1 {{ $result['quote_asset'] }} = {{ $result['unit_price_inverse'] }} {{ $result['base_asset'] }} </td>
</tr>