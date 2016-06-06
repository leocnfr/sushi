@extends('admin.admin_template')
@section('page_title','用户列表')
@section('content')
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
        </tr>
@endforeach
    </table>

@endsection