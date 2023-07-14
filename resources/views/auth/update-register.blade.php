<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
</head>
<body>
    @if($errors->any())
<div class="alert danger">
    @foreach($errors->all() as $error)
    <li style="color: red"> {{$error}}</li>
    @endforeach
@endif

<h2>Update registration Form</h2>
<form action="" method="post" id="myForm">
    @csrf
    <input type="text" name="first_name"placeholder="firstname" value="{{$user->first_name}}"><br>
    <input type="text" name="last_name"placeholder="lastname" value="{{$user->last_name}}"><br>
    <input type="text" name="address"placeholder="address" value="{{$user->address}}"><br>
    <input type="text" name="contact"placeholder="contact" value="{{$user->contact}}"><br>
    <input type="text" name="email"placeholder="email" value="{{$user->email}}"><br>
    <input type="text" name="password"placeholder="password" value="{{$user->password}}"><br>
    <input type="text" name="password_confirmation"placeholder="Confirm password"><br> 
    <input type="submit" value="Submit"> 
</form>
</body>
</html>