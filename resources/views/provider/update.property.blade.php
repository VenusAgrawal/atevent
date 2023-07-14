<h2>Add a new flower -</h2>
<form action="" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name"placeholder="name" value="{{ $flower->name }}"><br>
    <input type="text" name="poster"placeholder="picture" value="{{ $flower->poster }}"><br>
    <!--target the update inserting for removing the 'euro' sign inside the form while updating the form-->
    <input type="text" name="price"placeholder="price" value="{{ $flower->getAttributes()['price'] }}"><br>
    <input type="text" name="description"placeholder="description" value="{{ $flower->description }}"><br>
    <input type="text" name="type"placeholder="type" value="{{ $flower->type }}"><br>
    <input type="submit" value="Update">
</form>
@endsection
