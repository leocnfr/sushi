@extends('admin.admin_template')
@section('newsactive','active')
@section('content')
<h1>{{$news->title}}</h1>
    {!! $news->content !!}
<a href="{{url('/admin/news')}}" class="btn btn-default">返回</a>
<a href="{{url('/admin/news/edit/'.$news->id)}}" class="btn btn-success">编辑</a>
@endsection