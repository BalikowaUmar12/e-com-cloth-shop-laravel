<div class="card">
    <div class="card-header bg-primary">
        <h2 class="text-white">Profile</h2>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img src="{{asset('assets/images/profile/'. Auth::user()->photo)}}" alt="" width="100" height="100" class="m-2 rounded-circle"> 
            <form action="{{ route('updateUserPic') }}" class="d-flex justify-content-center"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <input type="file" class="form-control w-50 mx-2" name="photo">
                <button class="btn btn-primary" type="submit">Upload</button>
            </form>
        </div>
        <form action="{{ route('updateUserAccount') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 
            <div class="mt-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
            </div>

            <div class="mt-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
            </div>

            <div class="mt-3">
                <label for="password">Change Password</label>
                <input type="password" class="form-control mb-1" placeholder="Current password" name="oldPassword">
                <input type="password" class="form-control mb-1" placeholder="New password" name="password">
                <input type="password" class="form-control mb-1" placeholder="Repeat password" name="password_confirmation">
            </div>

            <div class="mt-2 text-end">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
</div>