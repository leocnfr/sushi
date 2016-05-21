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
                <th>产品类别</th>
                <th>创建时间</th>
                <th>操作</th>
                <th>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            按分类查看
                            <span class="caret"></span>
                        </button>
                        @if(count($cates)>0)
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                @foreach($cates as $cate)
                                    <li><a href="{{url('admin/products?cateBy='.$cate->cat_name)}}">{{$cate->cat_name}}</a></li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </th>
    		</tr>
    	</thead>
    	<tbody>
        @foreach($products as $product)
            <form action="{{url('/admin/product/delete')}}" method="post">
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->count}}</td>
                <td>{{number_format($product->price,2)}}</td>
                <td><img src="{{URL::asset('/storage/uploads/'.$product->productImage)}}" alt="" style="width: 50px;height: 50px"></td>
                <td>
                    @if(!empty($product->category->cat_name))
                        {{$product->category->cat_name}}
                    @endif
                </td>
                <td>{{$product->created_at}}</td>
                <td>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button class="btn btn-danger" type="submit">删除</button>
                    <a href="{{url('/admin/products/'.$product->id)}}" class="btn btn-default">编辑</a>
                </td>
            </tr>
            </form>
        @endforeach
    	</tbody>
    </table>
    @if(isset($_REQUEST['cateBy']))
        @else
        {!! $products->render() !!}
    @endif
@endsection