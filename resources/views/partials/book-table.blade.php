<div class="page-header">
    <h3>{{ $title }} Orders <small>{{ count($orders) }} Found</small></h3>
</div>

<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Price</th>
            <th>{{ $asset1 }}</th>
            <th>{{ $asset2 }}</th>
            <th>Sum ({{ $asset2 }})</th>
        </tr>
    </thead>
    <tbody>
    @if ( count($orders) )
        <?php $sum = 0; ?>
        @foreach( $orders as $result )
            <?php $sum = $sum + $result['total']; ?>
            @include('partials.book-row', ['result' => $result, 'sum' => $sum])
        @endforeach
    @endif
    </tbody>
</table>
</div>