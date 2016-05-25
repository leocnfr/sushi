@inject('boissons','App\Product')
<style>

</style>
<div class="modal fade" id="autre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="width: 920px;margin-top: 130px">
        <div class="modal-content" >
            {{--<div class="modal-header">--}}
            {{--<h4 class="modal-title" id="exampleModalLabel">New message</h4>--}}
            {{--</div>--}}
            <div class="modal-body" style="width: 920px;background: rgb(37,37,36);">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="row" style="color: #BAAA76">
                    <p>COMPOSITION DE MA FORMULE</p>
                    <p>Chaque menu offert un bol de riz blanc et un boisson au choix dans le menu dessous</p>
                    <p>BOISSON</p>
                    @foreach($boissons->showBoisson()->chunk(3) as $boissons)
                        <div class="row">
                            @foreach($boissons as $boisson)
                                <div class="col-md-4" style="width: 299px;height: 70px;color: #BAAA76">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" id="" name="">
                                            {{$boisson->name}}
                                        </label>
                                        <img src="/storage/uploads/{{$boisson->productImage}}" alt="" style="width: 50px">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @endforeach
                    <p>AUTRES</p>
                    <div class="col-md-4" style="width: 299px;height: 131px;color: #BAAA76">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" id="" name="">
                                Riz blanc
                            </label>
                        </div>
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

    })
</script>