@extends('admin.admin_template')
@section('page_title','用户列表')
@section('content')
    <form action="{{url('/admin/users')}}" method="get">
        <input type="text" class="form-control" placeholder="通过电话,姓名,地址 查找用户" name="query">
    </form>
    <table class="table">
        <thead>
            <tr>
                <td>编号</td>
                <td>姓名</td>
                <td>地址</td>
                <td>电话</td>
                <td>Societe</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
        </thead>
@foreach( $users as $key=>$user)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$user->prenom}} {{$user->nom}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->tel}}</td>
            <td>{{$user->societe}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <form action="{{url('/admin/users')}}" method="post" style="display: inline-block">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="{{$user->id}}">
                <button class="btn btn-danger" onclick="return confirm('确认删除')">删除</button>
                </form>
                <a class="btn btn-default" href="{{url('/admin/users/'.$user->id)}}">查看</a>
            </td>
        </tr>
@endforeach
    </table>
    {!! $users->links() !!}

@endsection