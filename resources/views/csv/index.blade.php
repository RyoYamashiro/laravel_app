<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <h1>Index</h1>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <input type="file" name="csv">
            <input type="submit">
        </form>
    </body>
</html>