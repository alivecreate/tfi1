<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Product Create Page</h1>
    <form action="">
        <input type="" name="" value="{{ $product['name'] }}"> Name
        <input type="" name="" value="{{ $product['price'] }}"> Price
    </form>
    <table>
    <tr>
        <td>Screen</td>
        <td>{{$specification['screen']}}</td>
    
    </tr>
    <tr>
        <td>Os</td>
        <td>{{$specification['os']}}</td>
    
    </tr>
    </table>
</body>
</html>