<form method="POST" action="{{ url(route('order::create')) }}">
{!! csrf_field() !!}

    <div class="row">
        <div class="col-md-8">

            @include('partials.session')

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="getQuantityInput">Buy:</label>
                        <div class="row">
                            <div class="col-sm-6 col-xs-4">
                                <input type="text" name="get_quantity" value="{{ old('get_quantity') }}" class="form-control input-lg" id="getQuantityInput" placeholder="0">
                            </div>
                            <div class="col-sm-6 col-xs-8" id="get_asset">
                                <input type="text" name="get_asset" value="{{ old('get_asset') }}" class="form-control input-lg typeahead" id="getAssetInput" placeholder="XCP" oninput="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="giveQuantityInput">Sell:</label>
                        <div class="row">
                            <div class="col-sm-6 col-xs-4">
                                <input type="text" name="give_quantity" value="{{ old('give_quantity') }}" class="form-control input-lg" id="giveQuantityInput" placeholder="0">
                            </div>
                            <div class="col-sm-6 col-xs-8" id="give_asset">
                                <input type="text" name="give_asset" value="{{ old('give_asset') }}" class="form-control input-lg typeahead" id="giveAssetInput" placeholder="XCP" oninput="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="sourceInput">Source:</label>
                        <input type="text" name="source" value="{{ old('source') }}" class="form-control input-lg" id="sourceInput" placeholder="1CounterpartyXXXXXXXXXXXXXXXUWLpVr">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="getExpirationInput">Expire: <small># Blocks</small></label>
                        <input type="text" name="expiration" value="{{ ( old('expiration') ? old('expiration') : '144' ) }}" class="form-control input-lg" id="getExpirationInput" placeholder="144 = 1 DAY">
                    </div>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-lg btn-primary"><small><i class="glyphicon glyphicon-edit"></i></small> Generate Transaction</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</form>