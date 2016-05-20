@extends('admin.admin_template')
@section('page_title','文章列表')
@section('newsactive','active')
@section('content')
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>编号</th>
                <th>标题</th>
                <th>创建时间</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($news as $key => $new)
                <form action="{{url('admin/news/destroy')}}" method="post">
                    {!! csrf_field() !!}
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$new->title}}</td>
                    <td>{{$new->created_at}}</td>
                    <td>
                        <a class="btn btn-info" href="{{url('admin/news/'.$new->id)}}">查看</a>
                        <button class="btn btn-danger">删除</button>
                        <input type="hidden" value="{{$new->id}}" name="id">
                    </td>
                </tr>
                </form>
            @endforeach
    	</tbody>
    </table>
@endsection