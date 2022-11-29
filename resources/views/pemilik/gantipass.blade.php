@extends("template.sidenavpemilik")

@section("title", "Edit Profile")

@section("content")


<h1>Ganti Password</h1>
<form action="{{url("/owner/gantipass")}}" method="post">
    @csrf
    Password Lama
    <br>
    <input type="password" class="form control" style="width: 300px" name="PLama" >
    <span style="color: red;">{{ $errors->first('PLama') }}</span>
    <br>
    Password Baru
    <br>
    <input type="password" class="form control" style="width: 300px" name="PBaru">
    <span style="color: red;">{{ $errors->first('PBaru') }}</span>
    <br>
    Password Confirmation
    <br>
    <input type="password" class="form control" style="width: 300px" name="PCBaru">
    <span style="color: red;">{{ $errors->first('PCBaru') }}</span>
    <br><br>
    <button class="btn btn-success">Save</button>

</form>

@endsection
