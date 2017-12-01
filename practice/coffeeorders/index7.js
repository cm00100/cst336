$(function() {

  var $orders = $('#orders');
  var $name = $('#name');
  var $drink = $('#drink');
  
  function addOrder(order){
      $orders.append('<li>name: ' + order.name +', drink: ' + order.drink + '</li>');

  }



  $.ajax({
    type: 'GET',
    url: 'api/orders.json',
    success: function(orders) {
      $.each(orders, function(i, order) {
        addOrder(order);
      });
    },
    error: function(){
      alert('error loading orders');
    }
    });
    
    $('#add-order').on('click', function(){
      
      var order = {
        name: $name.val(),
        drink: $drink.val(),
    };
    
    $.ajax({
      type: 'POST',
      url: 'api/orders.json',
      data: order,
      success: function(order){
        addOrder(order);
      },   
      error: function(){
        alert('error saving order');
      }
    });

  });


});
