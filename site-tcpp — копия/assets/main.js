// $(function() {
//
//     function showCart(cart){
//         $('.modal-body').html(cart);
//
//     }
//
//
//
// $('.add-to-cart').on('click', function (e) {
//     e.preventDefault();
//     let id = $(this).data('id');
//
//     $.ajax({
//         url: '../cart/cart.php',
//         type: 'GET',
//         data: {cart: 'add', id: id},
//         dataType: 'json',
//         success: function (res) {
//             if(res.code == 'ok') {
//                 showCart(res.answer);
//             }
//             else {
//
//             }
//
//         },
//         error: function () {
//             alert('Error');
//         }
//     });
// });
//
//
// $('#clear_cart').on('click', function () {
//     $.ajax({
//         url: '../cart/cart.php',
//         type: 'GET',
//         data: {cart: 'clear'},
//         success: function (res) {
//             showCart(res);
//         },
//         error: function () {
//             alert('Error');
//         }
//     });
// });
//
//
//
//
// });
// $(document).ready(function (){
//     $(document).on("click","#addItem",function (e) {
//         e.preventDefault();
//         var form = $(this).closest(".form-submit");
//         var id = form.find(".pid").val();
//         var name = form.find(".pname").val();
//         var price = form.find(".pprice").val();
//         var image = form.find(".pimage").val();
//         var code = form.find(".pcode").val();
//         var category = form.find(".pcategory").val();
//
//         $.ajax({
//             url: '../cart/cart.php',
//             method: "post",
//             data: {pid: id, pname: name, pprice: price, pimage: image, pcode: code,pcategory:category},
//             success: function (response) {
//                 $('.alert-message').html(response);
//                 window.scrollTo(0, 0);
//                 load_cart_item_number();
//             }
//         });
//
//     });
//     load_cart_item_number();
//
//     function load_cart_item_number(){
//         $.ajax({
//             url:"../cart/cart.php",
//             method: "get",
//             data:{miniCount:"mini_count"},
//             success:function (response){
//                 $(".mini-count").html(response);
//             }
//         });
//     }
//
// });



