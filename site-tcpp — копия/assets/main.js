// $(function() {
//
//     function showCart(cart) {
//         $('.modal-body').html(cart);
//
//         let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
//         $('.mini-cart-qty').text(cartQty);
//     }
//
//
//     $('.add-to-cart').on('click', function (e) {
//         e.preventDefault();
//         let id = $(this).data('id');
//
//         $.ajax({
//             url: '../cart/cart1.php',
//             type: 'GET',
//             data: {cart: 'add', id: id},
//             dataType: 'json',
//             success: function (res) {
//                 if (res.code == 'ok') {
//                     showCart(res.answer);
//                 } else {
//                     alert(res.answer);
//                 }
//             },
//             error: function () {
//                 alert('Error');
//             }
//         });
//     });
// });

$(function() {

    function showCart(cart)
    {
        $('.cart-modal').html(cart);
    }


    $('.add-to-cart').on('click',function (e){
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'cart/cart1.php',
            type: 'GET',
            data: {cart: 'add',id: id},
            dataType: 'json',
            success: function (res) {
                if(res.code == 'ok'){
                    showCart(res.answer);
                }
                else {
                    alert(res.answer);
                }
            },
            error: function () {
                alert('error');
            }
        });
    });
});

