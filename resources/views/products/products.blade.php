@extends('admin.admin_template')
@section('page_title','产品列表')
@section('productactive','active')
@section('content')
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>名称</th>
                <th>数量</th>
                <th>价格</th>
                <th>图片</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->count}}</td>
                <td>{{$product->price}}</td>
                <td><img src="{{URL::asset('/storage/uploads/'.$product->productImage)}}" alt="" style="width: 50px;height: 50px"></td>
                <td>
                    <button class="btn btn-danger">删除</button>
                    <a href="{{url('/admin/products/'.$product->id)}}" class="btn btn-default">编辑</a>
                </td>
            </tr>
        @endforeach
    	</tbody>
    </table>
@endsection