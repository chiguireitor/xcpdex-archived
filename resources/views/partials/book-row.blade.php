
<tr>
    <td><a href="{{ url(route('order')) }}">{{ $result['price'] }}</a></td>
    <td>{{ unSatoshi($result['amount']) }}</td>
    <td>{{ unSatoshi($result['total']) }}</td>
    <td>{{ unSatoshi($sum) }}</td>
</tr>
