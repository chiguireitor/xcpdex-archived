<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Date / Block Index</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    @if ( $orders )
        @foreach( $orders as $result )
            @include('partials.history-row', ['result' => $result])
        @endforeach
    @endif
    </tbody>
</table>
</div>