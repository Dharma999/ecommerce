<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h2>Mail From {{$from}}</h2>

   <p>
       {{$content}}
   </p>
   <p>
       Mobile no: {{$phone}}
   </p>
   <p>
       Regard {{config('app.name')}} Thank You
   </p>
</body>
</html>