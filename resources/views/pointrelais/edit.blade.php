@extends('admin.admin_template')
@section('page_title',$relais->name)
@section('relaisactive','active')
@section('content')
    <form action="{{url('/admin/relais/'.$relais->id)}}" method="post" role="form">

        <div class="form-group">
            <label for="">Point Relais名称</label>
            <input type="text" class="form-control" name="name" id="" placeholder="名称" value="{{$relais->name}}">
        </div>
        <div class="form-group">
            <label for="">Point Relais地址</label>
            <input type="text" class="form-control" name="address" id="" placeholder="地址" value="{{$relais->address}}">
        </div>
        <div class="form-group">
            @inject('times','App\Time')
            <label for="">选择送餐时间</label>
            @foreach($times::all() as $time)
                @if($relais->send_time==$time->name)
                    <div class="checkbox">
                        <label>
                            <input type="radio" value="{{$time->name}}" id="" name="send_time" checked>{{$time->name}}
                        </label>
                    </div>
                    @else
                    <div class="checkbox">
                        <label>
                            <input type="radio" value="{{$time->name}}" id="" name="send_time">{{$time->name}}
                        </label>
                    </div>
                    @endif

                @endforeach

        </div>
        <div class="form-group">
            <label for="">Point Relais介绍</label>
            <textarea type="text" class="form-control" name="intro" id="" placeholder="介绍" rows="10">{{$relais->intro}}</textarea>
        </div>
        {!! csrf_field() !!}
        <input type="hidden" value="{{$relais->id}}" name="id">
        <a href="{{url('admin/relais')}}" type="button" class="btn btn-default">返回</a>
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
@endsection