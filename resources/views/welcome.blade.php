<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>AjaxStartAjaxStop</title>
    <script src="{{ URL::asset ("js/jQuery-2.2.0.min.js") }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#loading").hide();
            $(document).ajaxStart(function(){
                $("#loading").show();
            });

            $(document).ajaxStop(function(){
                $("#loading").hide();
            });

            $("button[name='btnLoad']").click(function(){
                $.get("/cartJson", null, function(data){
                    $("#content").text(data);
                });
            });
        });
    </script>
    <style type="text/css">
        body{ padding:20px; }
        textarea{ width:350px; height:120px; }
        #loading{ background-color:#eee; border:solid 1px #999; margin:5px 0 10px; padding:5px; font-size:13px; }
    </style>
</head>

<body>

<div id="loading">Loading.....</div>
<textarea id="content"></textarea>
<button name="btnLoad">Load</button>

</body>
</html>