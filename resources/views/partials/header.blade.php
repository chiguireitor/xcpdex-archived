<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url(route('home')) }}"><img src="{{ url('img/xcp.png') }}" class="pull-left" /> XCP Dex</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url(route('matches')) }}">Matches</a></li>
                <li><a href="{{ url(route('orders')) }}">Orders</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://coinmarketcap.com/currencies/counterparty/?markets=all#markets" target="_blank">Markets</a></li>
                <li><a href="http://counterparty.io/docs/buy_and_sell_assets_on_the_dex/" target="_blank">Tutorial</a></li>
            </ul>
        </div>
    </div>
</nav>