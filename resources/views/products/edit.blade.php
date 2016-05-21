@extends('admin.admin_template')
@section('page_title','修改产品')
@section('productactive','active')
@section('content')
<form action="{{url('/admin/product/update/')}}" method="post" role="form" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">产品名称</label>
        <input type="text" class="form-control" name="name" id="" placeholder="产品名称" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label for="">产品分类</label>
        <select name="cat" id="inputID" class="form-control" required>
            @foreach( $cates as $cate)
                <option value="{{$cate->id}}">{{$cate->cat_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">产品数量</label>
        <input type="number" class="form-control" name="count" id="" placeholder="piece" value="{{$product->count}}">
    </div>
    <div class="form-group">
        <label for="">产品图片</label>
        <label for=""><img src="{{URL::asset('/storage/uploads/'.$product->productImage)}}" alt="" style="width: 50px;height: 50px"></label>
        <input type="file" class="form-control" name="photo" id="" placeholder="" >
    </div>
    <div class="form-group">
        <label for="">产品价格</label>
        <input type="number" class="form-control" name="price" id="" placeholder="产品价格" value="{{$product->price}}" step="0.1">
    </div>
    <div class="form-group">
        <label for="">产品介绍</label>
        <textarea type="text" class="form-control" name="intro" id="" placeholder="产品介绍" rows="10">{{$product->content}}</textarea>
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$product->id}}" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="button" class="btn btn-default" onclick="history.go(-1)">Back</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection