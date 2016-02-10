<tr>
    <td><a href="http://blockscan.com/tx?block={{ $result['block_index'] }}" target="_blank">{{ fixTimestamp($result['block_time']) }}</a></td>
    <td>{{ $result['base_quantity_normalized'] }} <a href="{{ url(route('asset', ['asset' => $result['base_asset'] ])) }}">{{ $result['base_asset'] }}</a></td>
    <td>{{ $result['quote_quantity_normalized'] }} @if( $result['quote_asset'] !== 'XCP' ) <a href="{{ url(route('asset', ['asset' => $result['quote_asset'] ])) }}">{{ $result['quote_asset'] }}</a> @else {{ $result['quote_asset'] }} @endif</td>
    <td>1 {{ $result['quote_asset'] }} = {{ $result['unit_price_inverse'] }} <a href="{{ url(route('asset', ['asset' => $result['base_asset'] ])) }}">{{ $result['base_asset'] }}</a></td>
</tr>