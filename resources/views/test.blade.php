<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            /**
           * Diagonal stripes - linear-gradient() method
           */
            background: linear-gradient(135deg,
            #ffffff 25%, #000000 0, #000000 50%,
            #ffffff 0, #ffffff 75%, #000000 0);
            background-size: 4px 4px;
        }
    </style>
</head>
<body>
{{phpinfo()}}
</body>
</html>