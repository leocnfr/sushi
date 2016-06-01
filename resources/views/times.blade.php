@extends('admin.admin_template')
@section('page_title','送餐时间段设置')
@section('content')
<form action="{{url('/admin/times')}}" method="post" role="form" style="width: 30%">
{!! csrf_field() !!}
	<div class="form-group">
		<label for=""></label>
		<input type="text" class="form-control" name="name" id="" placeholder="送餐时间段">
	</div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>编号</th>
                <th>时间</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
        @inject('times','App\Time')
        @foreach($times::all() as $key=>$time)
            <form action="{{url('admin/times')}}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="{{$time->id}}">
    		<tr>
    			<td>{{$key+1}}</td>
                <td>{{$time->name}}</td>
                <td><button class="btn btn-danger">删除</button></td>
    		</tr>
            </form>
        @endforeach
    	</tbody>
    </table>
@endsection