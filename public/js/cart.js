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
                piece+=parseInt(value.piece);
                count+=parseInt(value.qty);
                html+='<li class="list-unstyled">';
                html+='<span class="result_name">'+value.name+'</span>';
                html+='<div class="result_number_info">';
                html+='<i class="fa fa-minus" aria-hidden="true" ></i>';
                html+='<span style="margin: 0px 5px">'+value.qty+'</span> ';
                html+='<i class="fa fa-plus qty-plus" aria-hidden="true"  data-rawid="'+value.__raw_id+'"></i>';
                html+='</div>';
                html+='<span class="result_price ">'+value.price+'</span>';
                html+='<p style="padding: 0px 30px;text-align: left">'+value.boisson+'</p>';
                html+='</li>';

            });
            $('.result_price_list').html(html);
            $('#total_price').html(total);
            $('#product-total-count').html(count);
            $('#product-total-piece').html(piece);
        }else {
            $('.result_price_list > p').html('Votre panier est vide')
        }

    });
}