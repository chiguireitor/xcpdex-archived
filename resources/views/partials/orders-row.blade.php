@if ( $result['status'] == 'open')
<tr>
    <td><a href="http://blockscan.com/tx?block={{ $result['block_index'] }}" target="_blank">{{ $result['block_index'] }}</a></td>
    <td>{{ ucfirst($result['status']) }}</td>
    <td>
        {{ unSatoshi($result['give_quantity']) }}
        @if( $result['give_asset'] !== 'XCP' )
                <a href="{{ url(route('asset', ['asset' => $result['give_asset'] ])) }}">{{ $result['give_asset'] }}</a>
        @else
            {{ $result['give_asset'] }}
        @endif
    </td>
    <td>
        {{ unSatoshi($result['get_quantity']) }}
        @if( $result['get_asset'] !== 'XCP' )
            <a href="{{ url(route('asset', ['asset' => $result['get_asset'] ])) }}">{{ $result['get_asset'] }}</a>
        @else
            {{ $result['get_asset'] }}
        @endif
    </td>
    <td><a href="https://counterpartychain.io/address/{{ $result['source'] }}" target="_blank">{{ $result['source'] }}</a></td>
</tr>
@endif