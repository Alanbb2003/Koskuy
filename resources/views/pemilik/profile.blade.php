@extends("template.sidenavpemilik")

@section("title", "Edit Profile")

@section("content")


<h1>Edit Profile</h1>
<form action="{{url('/owner/editprofile')}}" method="post">
    @csrf
    Nama Lengkap
    <br>
    <input type="text" class="form control" style="width: 300px" name="EPNamaLengkap" value="{{$CUser->fullname}}">
    <br><br>
    Nomor Telepon
    <br>
    <input type="text" class="form control" style="width: 300px" name="EPNoTelp" value="{{$CUser->user_telp}}">
    <br><br>
    <button class="btn btn-success">Save</button>

</form>

@endsection
