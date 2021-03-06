@inject('boissons','App\Product')
<style>
.col-md-4 > .bossion-list:nth-of-type(2)
{
    border-left: 2px solid #BAAA76;
    border-right: 2px solid #BAAA76;

}
    .btn_boisson{
        border: none;
        background: #BAAA76;
        color: black;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        width: 84.63px;
    }
    #close_boisson:hover{
        opacity: 0.5;
    }
    #boisson_submit:hover{
        opacity: 0.5;
    }
</style>
<div class="modal fade" id="autre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="width: 920px;margin-top: 130px;background: black">
        <div class="modal-content" style="background: black">
            {{--<div class="modal-header">--}}
            {{--<h4 class="modal-title" id="exampleModalLabel">New message</h4>--}}
            {{--</div>--}}
            <div class="modal-body" style="width: 920px;background: rgba(37,37,36,0.6);">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="row" style="color: #BAAA76">
                    <div class="row" style="width: 81%;margin: 0px auto">
                        <p style="font-size: 20px;font-weight: bold">COMPOSITION DE MA FORMULE</p>
                        <p>Chaque menu offert un bol de riz blanc et un boisson au choix dans le menu dessous</p>
                        <p>BOISSON</p>
                        <small id="error" style="color: red;display: none">Veuillez choisir 1 accompagnements de la catégorie "Accompagnements offerts" maximum</small>
                        <small id="error2" style="color: red;display: none">Veuillez selectionner des produits à ajouter dans votre formule
                        </small>
                    </div>
                    <form action="" id="boission_form">
                    @foreach($boissons->showBoisson2()->chunk(3) as $boissons)
                        <div class="row" style="width: 81%;margin: 0px auto">
                            @foreach($boissons as $boisson)
                                <div class="col-md-4 bossion-list" style="width: 246px;height: 70px;color: #BAAA76">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="{{$boisson->id}}" id="" name="boissons[]" class="check_boisson">
                                            {{$boisson->name}}
                                        </label>
                                        <img src="/storage/uploads/{{$boisson->productImage}}" alt="" style="width: 50px">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @endforeach
                    <div class="row" style="width: 81%;margin: 0px auto">
                        <p>AUTRES</p>
                    </div>
                    <div class="row" style="width: 81%;margin: 0px auto">
                        <div class="col-md-4" style="width: 299px;height: 131px;color: #BAAA76">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="Riz blanc"  name="riz[]" class="check_riz">
                                    Riz blanc
                                </label>
                                <img src="/images/riz.png" alt="" style="width: 50px">
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="row " style="width: 81%;margin: 5px auto">
                        <button class="pull-right btn_boisson " id="close_boisson" data-dismiss="modal" aria-label="Close" style="display: block;">NON,MERCI</button>
                    </div>
                    <div class="row " style="width: 81%;margin: 5px auto">
                        <button class="pull-right btn_boisson" style="display: block" id="boisson_submit">VALIDER</button>
                    </div>

                    {{--<div class="col-md-4" style="width: 299px;height: 131px;color: #BAAA76">--}}
                        {{--<div class="checkbox">--}}
                        	{{--<label>--}}
                        		{{--<input type="checkbox" value="" id="" name="">--}}
                        		{{--Coca-cola zero--}}
                        	{{--</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $('#close_boisson').click(function () {
        $('#error2').hide();
        $('#error').hide();
        document.getElementById('boission_form').reset();
    });
    $('#autre').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var name = button.data('name');
        var count = button.data('count')+'piece';
        var price = button.data('price')+'€';
        var content = button.data('content');
        var src = button.data('src');
        var modal = $(this);
        $('#name').html(name);
        $('#count').html(count);
        $('#price').html(price);
        $('#intro').html(content);
        $('#modal-img').attr('src','/storage/uploads/'+src);
    });

    $(".check_boisson").click( function() {
        if ( $(".check_boisson:checked").length > 1) {
            $(this).removeAttr("checked","");
            $('#error').show();
        }
    } );
    $('#boisson_submit').click(function () {
        $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/cart',
                    type: "post"
                });
        if($(".check_boisson:checked").length==0||$(".check_riz:checked").length==0)
        {
            $('#error2').show();
            return false
        }else{
            var html='';
            $.ajax({
                data: {boissonId: $(".check_boisson:checked").val(),productId:productId,riz:$(".check_riz:checked").val()}
            }).done(function () {
                getCart();
            });
            $('#autre').modal('hide');
            $('#error2').hide();
            $('#error').hide();
            document.getElementById('boission_form').reset();
        }


    });

</script>