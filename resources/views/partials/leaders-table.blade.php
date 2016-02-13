<div class="table-responsive">
<table class="table table-hover" id="leaders">
    <thead>
        <tr>
            <th>Asset Name</th>
            <th>Price (XCP)</th>
            <th>Supply</th>
            <th>"Market Cap" (XCP)</th>
        </tr>
    </thead>
    <tbody>
    @if ( $markets )
        @foreach($markets as $market)
            @if ( $market['asset'] !== 'XCP' )
                @include('partials.leaders-row', ['result' => $market])
            @endif
        @endforeach
    @endif
    </tbody>
</table>
</div>