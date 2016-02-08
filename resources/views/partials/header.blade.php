<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('img/xcp.png') }}" class="pull-left" /> XCP DEX</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/') }}">Markets</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://counterparty.io/">Counterparty</a></li>
                <li><a href="http://counterparty.io/devparty/">Devparty</a></li>
                <li><a href="https://github.com/droplister/xcpdex">Github</a></li>
            </ul>
        </div>
    </div>
</nav>