<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <h1>showCSV</h1>
        <ul>
            @foreach($file as $data)
             <li>
                @foreach($data as $item)
                {{$item}},
                @endforeach
            </li>
            @endforeach
        </ul>
    </body>
</html>