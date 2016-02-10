
<tr>
    <td><a href="http://blockscan.com/tx?block={{ $result['block_index'] }}" target="_blank">{{ fixTimestamp($result['block_time']) }}</a></td>
    <td>{{ $result['unit_price'] }} {{ $asset2 }}</td>
    <td>{{ $result['base_quantity_normalized'] }} {{ $asset1 }}</td>
    <td>{{ $result['quote_quantity_normalized'] }} {{ $asset2 }}</td>
</tr>