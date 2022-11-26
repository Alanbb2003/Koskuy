@extends("template.sidenavpemilik")

@section("title", "Edit Profile")

@section("content")


<h1>Upload Bukti Transfer</h1>
<form action="{{url("/owner/uploadbukti/".$idhp)}}" method="post" enctype="multipart/form-data">
    @csrf
    Bukti Transfer
    <br>
    <input type="file" name="buktitf">
    <br>
    <br>
    <button class="btn btn-success">Upload</button>

</form>

@endsection
