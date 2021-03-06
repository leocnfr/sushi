/**
 * Created by YANTAO on 16/6/1.
 */

function getCart(){
    $.get('/cartJson', function (response) {
        var html='';
        var total=0;
        var count=0;
        var piece=0;
        if (response.length!=0){
            $.each(response, function (key,value) {
                total+=parseFloat(value.total);
                piece+=parseInt(value.piece*value.qty);
                count+=parseInt(value.qty);
                html+='<li class="list-unstyled ">';
                html+='<div class="row" style="margin: 0px;padding: 0px">';
                html+='<span class="result_name col-md-3" style="padding: 0px">'+value.name+'</span>';
                html+='<div class="result_number_info">';
                html+='<span class="qty-minus" data-rawid="'+value.__raw_id+'" data-count="'+value.qty+'" ><i class="fa fa-minus" aria-hidden="true" ></i></span>';
                html+='<span style="margin: 0px 5px">'+value.qty+'</span> ';
                html+='<span class="qty-plus" data-rawid="'+value.__raw_id+'" data-count="'+value.qty+'" ><i class="fa fa-plus " aria-hidden="true" ></i></span>';
                html+='</div>';
                html+='<span class="result_price ">'+value.total+'€</span>';
                html+='</div>';
                html+='<div class="row" style="margin: 0px ;padding: 0px">';
                html+='<p style="text-align: left">'+value.boisson+'</p>';
                html+='<p style="text-align: left">'+value.riz+'</p>';
                html+='</div>';
                html+='</li>';

            });
            $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/addCart',
                    type: "post"
                });
            $('.result_price_list').html(html);
            $('#total_price').html(total+'€');
            $('#panier-count').html(count).show();
            $('#product-total-count').html(count);
            $('#product-total-piece').html(piece);

        }else {
            $('.result_price_list').html('<p>Votre panier est vide</p>');
            $('#total_price').html(0);
            $('#panier-count').hide();
            $('#product-total-count').html(0);
            $('#product-total-piece').html(0);
        }

    });

}

$(document).ajaxStop(function () {
    $('.qty-plus').click(function () {
        var rawid= $(this).data('rawid');
        var count=$(this).data('count');
        $.ajaxSetup(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/updateCart',
                type: "post"
            });
        $.ajax({
            data: {rawid: rawid,count:count,type:'add'}
        }).done(function () {
            getCart();
        });
    });
    $('.qty-minus').click(function () {
        var rawid= $(this).data('rawid');
        var count=$(this).data('count');
        $.ajaxSetup(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/updateCart',
                type: "post"
            });
        $.ajax({
            data: {rawid: rawid,count:count,type:'minus'}
        }).done(function () {
            getCart();
        });
    })
});

