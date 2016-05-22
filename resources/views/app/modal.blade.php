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
        <div class="modal-content" >
            {{--<div class="modal-header">--}}
                {{--<h4 class="modal-title" id="exampleModalLabel">New message</h4>--}}
            {{--</div>--}}
            <div class="modal-body" style="width: 920px;background: rgb(37,37,36);">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="row">
                    <div class="col-md-5" >
                        <img src="{{URL::asset('/storage/uploads/menu1.png')}}" style="width: 353px;height: 275px;display: block;margin: 0px auto">
                    </div>
                    <div class="col-md-7" style="color: #BAAA76;text-align: center;border-left: 1px solid #BAAA76">
                        <p style="font-size: 40px;font-weight: bold" id="name">MENU LUNCH A</p>
                        <span style="font-size: 35px;margin-right: 60px" id="count" >12piece </span>
                        <span style="font-size: 35px" id="price">15.90€</span>
                        {{--<table style="width: 500px;margin-top: 20px">--}}
                            {{--<thead>--}}
                                {{--<th></th>--}}
                                {{--<th>Quantité</th>--}}
                                {{--<th>Energie</th>--}}
                                {{--<th>Protéines</th>--}}
                                {{--<th>Lipides</th>--}}
                                {{--<th>Glucides</th>--}}
                            {{--</thead>--}}
                           {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>6 california thon cuit avocat</td>--}}
                                    {{--<td>169</td>--}}
                                    {{--<td>276</td>--}}
                                    {{--<td>9.7</td>--}}
                                    {{--<td>7.6</td>--}}
                                    {{--<td>42.7</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>6 california thon cuit avocat</td>--}}
                                    {{--<td>169</td>--}}
                                    {{--<td>276</td>--}}
                                    {{--<td>9.7</td>--}}
                                    {{--<td>7.6</td>--}}
                                    {{--<td>42.7</td>--}}
                                {{--</tr>--}}
                           {{--</tbody>--}}
                        {{--</table>--}}
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
        var count = button.data('count')+'piece';
        var price = button.data('price')+'€';
        var content = button.data('content');
        var modal = $(this);
        $('#name').html(name);
        $('#count').html(count);
        $('#price').html(price);
        $('#intro').html(content);

    })
</script>