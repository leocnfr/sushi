
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="width: 920px;margin-top: 130px">
        <div class="modal-content" >
            {{--<div class="modal-header">--}}
                {{--<h4 class="modal-title" id="exampleModalLabel">New message</h4>--}}
            {{--</div>--}}
            <div class="modal-body" style="width: 920px;background: rgba(94,93,91,0.3);">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="row">
                    <div class="col-md-6" style="width: 444px;border-right: 1px solid #BAAA76">
                        <img src="{{URL::asset('/storage/uploads/menu1.png')}}" style="width: 353px;height: 275px;display: block;margin: 0px auto">
                    </div>
                    <div class="col-md-6" style="width: 476px;color: #BAAA76;text-align: center">
                        <p style="font-size: 40px;font-weight: bold" id="name">MENU LUNCH A</p>
                        <span style="font-size: 35px" id="count">12piece </span>
                        <span style="font-size: 35px" id="price">15.90€</span>
                    </div>
                </div>
                <div class="row">
                    <div id="content" style="height: 146px;display: block"></div>

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
        var count = button.data('count')+'piece';
        var price = button.data('price')+'€';
        var content = button.data('content');
        var modal = $(this);
        $('#name').html(name);
        $('#count').html(count);
        $('#price').html(price);
        $('#content').html(content);

    })
</script>