<tr>
    <td><a href="http://blockscan.com/tx?block={{ $result['block_index'] }}" target="_blank">{{ fixTimestamp($result['block_time']) }}</a></td>
    <td>{{ $result['unit_price'] }} XCP</td>
    <td>{{ $result['base_quantity_normalized'] }} {{ $asset }}</td>
    <td>{{ $result['quote_quantity_normalized'] }} XCP</td>
</tr>