@extends('admin.admin_template')
@section('page_title','添加Relais')
@section('relaisactive','active')
@section('content')
    <form action="{{url('/admin/add')}}" method="post" role="form">

    	<div class="form-group">
    		<label for="">Point Relais名称</label>
    		<input type="text" class="form-control" name="name" id="" placeholder="名称">
    	</div>
        <div class="form-group">
            <label for="">Point Relais地址</label>
            <input type="text" class="form-control" name="address" id="" placeholder="地址">
        </div>
        <div class="form-group">
            <label for="">Point Relais地址</label>
            <textarea type="text" class="form-control" name="intro" id="" placeholder="介绍" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection