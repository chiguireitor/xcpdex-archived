@if ( count($errors) > 0 || session('warning') )

    @if (count($errors) > 0)
    <div class="alert alert-danger alert-thin">
        <i class="glyphicon glyphicon-exclamation-sign"></i> Encountered error(s) - Check submitted form for details.
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning alert-thin">
        <i class="glyphicon glyphicon-exclamation-sign"></i> {!! session('warning') !!}
    </div>
    @endif

@endif
