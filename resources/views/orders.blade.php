@extends('admin.admin_template')
@section('page_title','今日订单')
@section('content')
    <table class="table">
        <tr>
            <td>用户</td>
            <td>送餐内容</td>
            <td>地址</td>
            <td></td>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->showUser($order->user_id)}}</td>
                <td>{!! $order->content !!}</td>
                <td>{{$order->address}}</td>
            </tr>
        @endforeach
    </table>
@endsection