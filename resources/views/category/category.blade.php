@extends('admin.admin_template')
@section('page_title','产品分类')
@section('productactive','active')
@section('content')
    <form action="{{'/admin/category/store'}}" method="post" role="form" style="width: 200px">
    	<legend>添加产品分类</legend>

    	<div class="form-group">
    		<label for=""></label>
    		<input type="text" class="form-control" name="cat_name" id="" placeholder="分类名称" required>
            {!! csrf_field() !!}

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>编号</th>
                <th>分类名称</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>

    		@foreach( $cates as $key=>$cate)
                <tr>
                    <form action="{{url('/admin/category/'.$cate->id)}}" method="post">
                        <td>{{$key+1}}</td>
                        <td>{{$cate->cat_name}}</td>
                        <td>
                            <a class="btn btn-info" href="#modal-id" data-toggle="modal" data-whatever="{{$cate->cat_name}}" data-num="{{$cate->id}}">编辑</a>
                            <button class="btn btn-danger" id="del" type="submit" onclick="return confirm('确定删除')">删除</button>
                            {!! csrf_field() !!}
                        </td>
                </form>
                </tr>
            @endforeach
    	</tbody>
    </table>
    @if(session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session('status')}}
        </div>
    @endif

    <div class="modal fade" id="modal-id">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">编辑分类</h4>
    			</div>
    			<div class="modal-body">
                    <form action="{{url('/admin/category/update')}}" id="editCate" method="post">
                        <input type="text" id="cat-name" class="form-control" name="cat_name">
                        <input type="hidden" id="cat-id" name="cat_id" >
                        {!! csrf_field() !!}
                    </form>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary" id="submit">Save changes</button>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
            $('#modal-id').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var cat_name = button.data('whatever');// Extract info from data-* attributes
                var cat_id= button.data('num');
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('#cat-name').val(cat_name);
                modal.find('#cat-id').val(cat_id);
            });

            $('#submit').click(function () {
                $('#editCate').submit();
            })

    </script>
@endsection
