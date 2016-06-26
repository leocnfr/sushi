/**
 * Created by YANTAO on 16/6/2.
 */
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
                html+= '<li class="list-group-item">';
                html+='<div class="col-md-5" style="margin: 0px; margin-top:-41px;padding: 0px">';
                html+='<span style=" width: 152px;"> ';
                html+='<img src="/storage/uploads/001_1902-2.jpg" alt="" style="width: 152px;height: 117px;">';
                html+= '</span>';
                html+='<span style="font-size: 20px;font-weight: bold">'+value.name+'</span>';
                html+='<span style="margin-left: 10px;">'+value.boisson+'</span>';
                html+='<span style="margin-left: 10px;">'+value.riz+'</span>';
                html+='</div>';
                html+='<span style="font-size: 14px;width:150px;display: inline-block">'+value.piece *value.qty+'&nbsp;pièces</span>';
                html+='<div class="qty-info">';
                html+=' <span class="qty-minus" data-rawid="'+value.__raw_id+'" data-count="'+value.qty+'" ><i class="fa fa-minus" aria-hidden="true" ></i></span>';
                html+='<span style="margin: 0px 5px;font-size: 20px">'+value.qty+'</span>';
                html+='<span class="qty-plus" data-rawid="'+value.__raw_id+'" data-count="'+value.qty+'" ><i class="fa fa-plus " aria-hidden="true" ></i></span>';
                html+='</div>';
                html+='<span style="font-size: 20px;width: 150px;display: inline-block;">'+value.price*value.qty+'&nbsp;€</span>';
                html+='<span class="deletePanier " data-rawid="'+value.__raw_id+'" style="cursor: pointer;display: inline-block" ><i class="fa fa-times"></i></span>';
                html+=' </li>';
            });
            $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/addCart',
                    type: "post"
                });
            $('#result').html(html);
            $('#total_price').html(total+'€');
            $('#panier-count').html(count).show();
            $('#product-total-count').html(count);
            $('#product-total-piece').html(piece);

        }else {
            $('#result').html('<p>Votre panier est vide</p>');
            $('#total_price').html(0+'€');
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
    });
    $('.deletePanier').click(function () {
        var rawid= $(this).data('rawid');
        $.ajaxSetup(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/delCart',
                type: "post"
            });
        $.ajax({
            data: {rawid: rawid}
        }).done(function () {
            getCart();
        });
    })
});

