@extends('admin.admin_template')
@section('page_title','Relais列表')
@section('relaisactive','active')
@section('content')
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>编号</th>
                <th>Relais名称</th>
                <th>地址</th>
                <th>介绍</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
            @foreach($relais as $key=>$relai)
                <form action="{{url('/admin/relais/destroy')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" value="{{$relai->id}}" name="id">
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$relai->name}}</td>
                    <td>{{$relai->address}}</td>
                    <td>{{$relai->intro}}</td>
                    <td>
                        <a class="btn btn-info" href="{{url('/admin/relais/'.$relai->id)}}">编辑</a>
                        <button class="btn btn-danger" onclick="return confirm('确定删除?')">删除</button>
                    </td>
                </tr>
                </form>
            @endforeach
    	</tbody>
    </table>
@endsection