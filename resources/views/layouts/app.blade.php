<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Pos') }}</title>

    <meta name="description" content="سقياكم لتوصيل مياه الشرب">
    <meta name="author" content="سقياكم لتوصيل مياه الشرب">
    <title>سقياكم</title>
    <link href="favicon.png" rel="shortcut icon" type="{{url('site_files/image/x-icon')}}">
    <link rel="stylesheet" href="{{url("/site_files/css/aos.css")}}">
    <!--		<link rel="stylesheet" href="css/bootstrap.css">-->
    <link rel="stylesheet" href="{{url("/site_files/css/bootstrap4-rtl.min.css")}}">
    <link rel="stylesheet" href="{{url("/site_files/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{url("site_files/css/fontawesome.css")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Krub|Oswald">
    <!-- <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{url("/site_files/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{url("/site_files/css/swiper.min.css")}}">
    <link rel="stylesheet" href="{{url("/site_files/css/animate.css")}}">
    <link rel="stylesheet" href="{{url("/site_files/css/style.css")}}">
    <link rel="stylesheet" href="{{url("/site_files/css/media.css")}}">
    <link rel="stylesheet" href="{{url("/site_files/css/responsive.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.6.0/sweetalert2.css">

    <link rel="stylesheet" href="{{url("site_files/scss/new-style.css")}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style type="text/css">
        .invalid-feedback {
            color: red;
        }

        .company-item:hover {
            text-decoration: none;
        }

        .col-water {
            margin-bottom: 20px;
        }

        .choose-address {
            margin-top: 20px;
        }

        .address {
            background: rgb(245, 245, 245);
            border: 1px solid rgb(201, 201, 201);
            min-height: 40px;
            width: 100%;
            border-radius: 50px;
        }
    </style>

</head>


<body>

    <div class="content-container no-padding">
        @include('layouts.includesSite.navbar')
        <main class="py-4">
            @include('partials._session')
            @yield('content')
        </main>
        @include('layouts.includesSite.footer')

    </div>

    <script src="{{url('site_files/js/bootstrap.min.js')}}"></script>
    <script src="{{url('site_files/js/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{url('site_files/js/swiper.min.js')}}" type="text/javascript"></script>
    <script src="{{url('site_files/js/script.js')}}"></script>
    <script src="{{url('site_files/js/newJs.js')}}"></script>
    <script src="{{url('site_files/js/aos.js')}}"></script>
    <script src="{{url('dashboard_files/js/custom/main.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{url('dashboard_files/js/jquery.number.min.js')}}"></script>
 <!-- AdminLTE for costum -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });
    </script>
@auth

<script>
    $(document).ready(function () {

//add product btn
$('.add-product-btn').on('click', function (e) {

    e.preventDefault();
    var name = $(this).data('name');
    var id = $(this).data('id');
    var price = $.number($(this).data('price'), 2);

    $(this).removeClass('btn-success').addClass('btn-default disabled');

    var html =
        `<tr>
            <td>${name}</td>
            <td><input type="number" name="products[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
            <td class="product-price">${price}</td>
            <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
        </tr>`;

    $('.order-list').append(html);

    //to calculate total price
    calculateTotal();
});

//disabled btn
$('body').on('click', '.disabled', function(e) {

    e.preventDefault();

});//end of disabled

//remove product btn
$('body').on('click', '.remove-product-btn', function(e) {

    e.preventDefault();
    var id = $(this).data('id');

    $(this).closest('tr').remove();
    $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

    //to calculate total price
    calculateTotal();

});//end of remove product btn

//change product quantity
$('body').on('keyup change', '.product-quantity', function() {

    var quantity = Number($(this).val()); //2
    var unitPrice = parseFloat($(this).data('price').replace(/,/g, '')); //150
    console.log(unitPrice);
    $(this).closest('tr').find('.product-price').html($.number(quantity * unitPrice, 2));
    calculateTotal();

});//end of product quantity change

//list all order products
$('.order-products').on('click', function(e) {

    e.preventDefault();

    $('#loading').css('display', 'flex');

    var url = $(this).data('url');
    var method = $(this).data('method');
    $.ajax({
        url: url,
        method: method,
        success: function(data) {

            $('#loading').css('display', 'none');
            $('#order-product-list').empty();
            $('#order-product-list').append(data);

        }
    })

});//end of order products click

//print order
$(document).on('click', '.print-btn', function() {

    $('#print-area').printThis();

});//end of click function



});//end of document ready

//calculate the total
function calculateTotal() {

var price = 0;

$('.order-list .product-price').each(function(index) {

    price += parseFloat($(this).html().replace(/,/g, ''));


});//end of product price
$('.total-price').html($.number(price, 2));


//check if price > 0
if (price > 0) {

    $('#add-order-form-btn').removeClass('disabled')

} else {

    $('#add-order-form-btn').addClass('disabled')

}//end of else

}//end of calculate total

</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-add-card').click(function(e) {
                var url = $(this).data('url');
                var method = $(this).data('method');
                var user = $(this).data('user');
                var products = $(this).data('products');
                var quantity = '1';
                // var title = {{__('site.add_to_cart')}};
                e.preventDefault(); // this prevents the form from submitting
                $(this).html('تم الاضافة');
                var myorder = $('#myorder-count').val()

                $.ajax({
                    url: url,
                    method: method,
                    data: {
                        user: user,
                        "_token": $('#tokenProduct').val(),
                        products: products,
                        quantity: quantity
                    },
                    success: function(data) {
                        swal({
                            position: 'top-end',
                            icon: 'success',
                            title: "تم الاضافة",
                            showConfirmButton: false,
                            timer: 1500
                        });


                    },
                    error: function(data) {
                        alert(data)
                    }

                });
            });
        });
    </script>
@endauth
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}


<script>
    $(document).ready(function() {
       $( "#search" ).autocomplete({

           source: function(request, response) {
               $.ajax({
               url: "{{url('autocomplete')}}",
               data: {
                       term : request.term
                },
               dataType: "json",
               success: function(data){
                  var resp = $.map(data,function(obj){
                       //console.log(obj.city_name);
                       return obj.name;
                  });

                  response(resp);
               }
           });
       },
       minLength: 1
    });
   });

   </script>
</body>

</html>
