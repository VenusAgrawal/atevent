@extends('templates/template')

@section('title', 'Upload a file')

@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<h2 class="headingupload"> Upload your files </h2>
<div class="uploadfile">
    
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="myFile" class="form-control uploadfilecontainer" id="customFile" />
        <button type="submit" class="btn btn-default btn-lg uploadfilebutton" value="Upload">Upload</button>
        
    </form>

</div>

@endsection
