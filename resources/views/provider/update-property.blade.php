
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update property details</title>
</head>
<body>
    @if($errors->any())
<div class="alert danger">
    @foreach($errors->all() as $error)
    <li style="color: red"> {{$error}}</li>
    @endforeach
@endif

<h2>Update property details</h2>
<form action="" method="post">
    @csrf
    @method ('PUT')
    <input type="text" name="area"placeholder="area" value="{{$property->area}}"><br>
    <input type="text" name="price"placeholder="price" value="{{$property->price}}"><br>
    <input type="text" name="description"placeholder="description" value="{{$property->description}}"><br>
    <input type="text" name="house_no"placeholder="house_no" value="{{$property->house_no}}"><br>
    <input type="text" name="street_name"placeholder="street_name" value="{{$property->street_name}}"><br>
    <input type="text" name="city"placeholder="city" value="{{$property->city}}"><br>
    <input type="text" name="postal_code"placeholder="postal_code" value="{{$property->postal_code}}"><br>
    <input type="text" name="country"placeholder="country" value="{{$property->country}}"><br>
    <input type="submit" value="Submit"> 
</form>

