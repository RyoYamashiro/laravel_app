<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <h1>showCSV</h1>
        <ul>
            @foreach($data as $item)
             <li>{{$item}}</li>
            @endforeach
        </ul>
    </body>
</html>