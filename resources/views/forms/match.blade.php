<form method="POST" action="{{ url(route('match::find')) }}">
{!! csrf_field() !!}

    <div class="row">
        <div class="col-md-8">

            @include('partials.session')

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="actionSelect">I want to:</label>
                        <select name="action" class="form-control input-lg" id="actionSelect">
                            <option value="null"></option>
                            <option>BUY</option>
                            <option>SELL</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="getAssetInput">This asset:</label>
                        <div id="getMarketInput">
                            <input type="text" name="asset" value="{{ old('asset') }}" class="form-control input-lg typeahead" id="getAssetInput" oninput="this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-lg btn-primary"><small><i class="glyphicon glyphicon-search"></i></small> Find Orders</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</form>