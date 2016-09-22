$(function(){
  var items = [
    { value: 'Toys', data: 'TOYS' },
    { value: 'Gucci Watch', data: 'WATCH' },
  ];
  
  // setup autocomplete function pulling from currencies[] array
  $('#autocomplete').autocomplete({
    lookup: items,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Item Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
    }
  });
  

});