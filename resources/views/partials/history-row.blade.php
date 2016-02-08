<tr>
    <td><a href="https://counterpartychain.io/block/{{ $result['block_index'] }}" target="_blank">{{ fixTimestamp($result['block_time']) }}</a></td>
    <td>{{ $result['unit_price'] }}</td>
    <td>{{ $result['base_quantity_normalized'] }}</td>
    <td>{{ $result['quote_quantity_normalized'] }}</td>
</tr>