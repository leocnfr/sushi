@extends('admin.admin_template')
@section('page_title','添加产品')
@section('productactive','active')
@section('content')
    <form action="{{url('/admin/product/store')}}" method="post" role="form">

    	<div class="form-group">
    		<label for="">产品名称</label>
    		<input type="text" class="form-control" name="name" id="" placeholder="产品名称" required>
    	</div>
        <div class="form-group">
            <label for="">产品图片</label>
            <input type="file" class="form-control" name="photo" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="">产品价格</label>
            <input type="text" class="form-control" name="" id="" placeholder="产品价格">
        </div>
        <div class="form-group">
            <label for="">产品介绍</label>
            <textarea type="text" class="form-control" name="intro" id="" placeholder="产品介绍" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection