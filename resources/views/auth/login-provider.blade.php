

<h2>Provider Login Form</h2>

@if($errors->any())
<div class="alert danger">
    @foreach($errors->all() as $error)
    <li style="color: red"> {{$error}}</li>
    @endforeach
@endif

</div>

<form action="" method="post">
    @csrf
    <input type="text" name="email"placeholder="email"><br>
    <input type="text" name="password"placeholder="password"><br>
    <input type="submit" value="Login">
    <input type="submit" value="Register">
</form>
