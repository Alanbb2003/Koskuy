@extends("template.sidenavpemilik")

@section("title", "Edit Profile")

@section("content")


<h1>Edit Profile</h1>
<form action="" method="post">

    Nama Lengkap
    <br>
    <input type="text" class="form control" style="width: 300px" name="EPNamaLenkap">
    <br><br>
    Nomor Telepon
    <br>
    <input type="text" class="form control" style="width: 300px" name="EPNoTelp">
    <br><br>
    <button class="btn btn-success">Save</button>

</form>

@endsection
