@extends("template.master")
@section("title", "Home")

@section("content")
<br><br><br><br>
<div class="container mt-5">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
                {{-- <div class="col-md-3 border-right"> --}}
                    <form action="{{route('saveedit')}}" method="POST">
                        @csrf
                    {{-- <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                    <div class="col-md-12"><label class="labels">Photo</label><input type="file" class="form-control" placeholder="Photo" name="edtphoto"></div>
                </div> --}}
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" placeholder="username" name="edtusername"></div>
                            <div class="col-md-12"><label class="labels">Full Name</label><input type="text" class="form-control" placeholder="Full name" name="edtfullname"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" name ="edtnumber"></div>   
                        </div>
                        <div class="row mt-3">
                            <h4>password</h4>
                            <div class="col-md-12"><label class="labels">Old password</label><input type="text" class="form-control" placeholder="Old password" name="edtoldpass"></div>
                            <div class="col-md-6"><label class="labels">New Password</label><input type="text" class="form-control" value="" placeholder="New Password" name="edtnewpass"></div>
                            <div class="col-md-6"><label class="labels">Confirmation</label><input type="text" class="form-control" value="" placeholder="Confirmation" name="edtconpass"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection