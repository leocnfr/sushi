@extends('admin.admin_template')
@section('content')
    <table class="table table-border">
        <tr>
            <td>Nom:</td>
            <td>{{$user->nom}}</td>
        </tr>
        <tr>
            <td>Prenom:</td>
            <td>{{$user->prenom}}</td>
        </tr>
        <tr>
            <td>Sex</td>
            <td>{{$user->sex}}</td>
        </tr>
        <tr>
            <td>Societe:</td>
            <td>{{$user->societe}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>Tel:</td>
            <td>{{$user->tel}}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{$user->address}}</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>{{$user->zip_code}}</td>
        </tr>
    </table>
    <a class="btn btn-default" href="{{url('/admin/users')}}">返回</a>
@endsection