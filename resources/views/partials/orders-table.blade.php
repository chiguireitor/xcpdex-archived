<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Block #</th>
            <th>Status</th>
            <th>Buying</th>
            <th>Selling</th>
            <th>Source</th>
        </tr>
    </thead>
    <tbody>
    @if ( count($orders) )
        @foreach( $orders as $result )
            @include('partials.orders-row', ['result' => $result])
        @endforeach
    @endif
    </tbody>
</table>
</div>