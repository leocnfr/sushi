@extends('admin.admin_template')
@section('page_title','积分设置')
@section('content')
    <form action="{{url('/admin/points')}}" method="post">
        {!! csrf_field() !!}
        <input type="number" placeholder="欧元" name="price" min="0"> = <input type="number" name="point" min="0" placeholder="积分">
    </form>
@endsection