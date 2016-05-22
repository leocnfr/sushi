@extends('admin.admin_template')
@section('page_title','添加产品')
@section('productactive','active')
@section('content')
    <form action="{{url('/admin/product/store')}}" method="post" role="form" enctype="multipart/form-data">

    	<div class="form-group">
    		<label for="">产品名称</label>
    		<input type="text" class="form-control" name="name" id="" placeholder="产品名称" required>
    	</div>
        <div class="form-group">
            <label for="">产品分类</label>
            <select name="cat_id" id="inputID" class="form-control" required>
                @foreach( $cates as $cate)
                    <option value="{{$cate->id}}">{{$cate->cat_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">产品数量</label>
            <input type="number" class="form-control" name="count" id="" placeholder="piece">
        </div>
        <div class="form-group">
            <label for="">产品图片</label>
            <input type="file" class="form-control" name="productImage" id="" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="">产品价格</label>
            <input type="number" class="form-control" name="price" id="" placeholder="产品价格" step="0.1">
        </div>
        <div class="form-group">
            <label for="">产品介绍</label>
			<textarea id="textarea1" class="form-control" rows="15" name="content" required>
			</textarea>
        </div>
        {!! csrf_field() !!}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        <script type="text/javascript">
        var editor = new wangEditor('textarea1');

        editor.create();
    </script>
@endsection