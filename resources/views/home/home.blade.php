<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tela inicial </title>
</head>
<body>
    @if($token)

        <div>Tem token valido</div>

    @else
        <div>Token invalido </div>
    @endif
</body>
</html>
