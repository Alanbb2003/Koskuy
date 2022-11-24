@extends("template.sidenavpemilik")

@section("title", "Edit Profile")

@section("content")


<h1>Ganti Password</h1>
<form action="{{url("/owner/gantipass")}}" method="post">

    Password Lama
    <br>
    <input type="text" class="form control" style="width: 300px" name="PLama">
    <br>
    Password Baru
    <br>
    <input type="text" class="form control" style="width: 300px" name="PBaru">
    <br>
    Password Confirmation
    <br>
    <input type="text" class="form control" style="width: 300px" name="PCBaru">
    <br><br>
    <button class="btn btn-success">Save</button>

</form>

@endsection
