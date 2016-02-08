var markets = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: 'https://xcpdex.com/json'
});

$('#get_asset .typeahead').typeahead(null, {
  name: 'markets',
  source: markets
});

$('#give_asset .typeahead').typeahead(null, {
  name: 'markets',
  source: markets
});

$('#getMarketInput .typeahead').typeahead(null, {
  name: 'markets',
  source: markets
});