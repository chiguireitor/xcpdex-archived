
<tr>
    <td><a href="http://blockscan.com/tx?block={{ $result['block_index'] }}" target="_blank">{{ $result['block_index'] }}</a></td>
    <td>{{ ucfirst($result['status']) }}</td>
    <td><a href="{{ url(route('asset', ['asset' => $result['get_asset'] ])) }}">{{ unSatoshi($result['get_quantity']) }} {{ $result['get_asset'] }}</a></td>
    <td><a href="{{ url(route('asset', ['asset' => $result['give_asset'] ])) }}">{{ unSatoshi($result['give_quantity']) }} {{ $result['give_asset'] }}</a></td>
    <td><a href="https://counterpartychain.io/address/{{ $result['source'] }}" target="_blank">{{ $result['source'] }}</a></td>
</tr>
