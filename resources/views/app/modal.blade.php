<style>
    table{
        width: 500px;
        margin-top: 20px;
        font-size: 13px;
    }
    #intro>p{
        float: left;
        margin-top: 5px;
    }
    tr>td:first-child{
        text-align: left;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="width: 920px;margin-top: 130px">
        <div class="modal-content" style="background: black">
            {{--<div class="modal-header">--}}
                {{--<h4 class="modal-title" id="exampleModalLabel">New message</h4>--}}
            {{--</div>--}}
            <div class="modal-body" style="width: 920px;background: rgba(37,37,36,0.6);">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="row">
                    <div class="col-md-5" >
                        <img id="modal-img" src="{{URL::asset('/storage/uploads/menu1.png')}}" style="width: 353px;height: 275px;display: block;margin: 0px auto">
                    </div>
                    <div class="col-md-7" style="color: #BAAA76;text-align: center;border-left: 1px solid #BAAA76;min-height: 244px">
                        <p style="font-size: 40px;font-weight: bold" id="name">MENU LUNCH A</p>
                        <span style="font-size: 35px;margin-right: 60px" id="count" >12pièce </span>
                        <span style="font-size: 35px" id="price">15.90€</span>
                        <div id="intro">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var name = button.data('name');
        var count = button.data('count')+' pièce';
        var price = button.data('price')+' €';
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