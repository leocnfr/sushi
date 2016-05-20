@extends('admin.admin_template')
@section('page_title',$news->title)
@section('newsactive','active')
@section('content')

    <form action="" method="post" role="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="">标题</label>
            <input type="text" class="form-control" name="title" id="" placeholder="文章标题" required value="{{$news->title}}">
        </div>

        <div class="form-group">
            <label for="">内容</label>
			<textarea id="textarea1" class="form-control" rows="15" name="content" required>
			{{$news->content}}
			</textarea>
        </div>
        <input type="hidden" value="{{$news->id}}" name="id">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script type="text/javascript">
        var editor = new wangEditor('textarea1');

        // 上传图片（举例）
        editor.config.uploadImgUrl = '/admin/news/uploadImg';
        editor.config.uploadImgFns.onload = function (resultText, xhr) {
            // resultText 服务器端返回的text
            // xhr 是 xmlHttpRequest 对象，IE8、9中不支持

            // 如果 resultText 是图片的url地址，可以这样插入图片：
            editor.command(null, 'insertHtml', '<img src="/storage/uploads/' + resultText + '" style="max-width:100%;"/>');
            // 如果不想要 img 的 max-width 样式，也可以这样插入：
            // editor.command(null, 'InsertImage', resultText);
            console.log(resultText);
        };

        // 配置自定义参数（举例）
        editor.config.uploadParams = {
            _token: $('input[name="csrf-token"]').val(),
            user: 'wangfupeng1988'
        };

        editor.create();
    </script>
@endsection