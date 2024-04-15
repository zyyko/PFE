<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="post" action="{{ route('ajouter.strore') }}" enctype="multipart/form-data">
        @csrf
        <label for="">Type</label>
        <input type="text" name="type" id=""><br />
        <label for="">Ville</label>
        <input type="text" name="ville" id=""><br />
        <label for="">Descirtion</label>
        <input type="text" name="description" id="">
        <input type="file" name="image" id=""><br />
        <input type="submit" value="Inserez">
    </form>
</body>

</html>
