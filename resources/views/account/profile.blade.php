<div class="card">
    <div class="card-header bg-primary">
        <h2 class="text-white">Profile</h2>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img src="" alt="" srcset="" class="profile-img">
            <input type="file" class="form-control w-50 mx-auto">
        </div>
        <form action="" class="form" method="PUT" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
           <div class="mt-2">
                <label for="">Name</label>
                <input type="text" class="form-control" value="{{Auth::user()->name}}">
           </div>
           <div class="mt-2">
                <label for="">Email</label>
                <input type="email" class="form-control" value="{{Auth::user()->email}}">
           </div>
           <div class="mt-3">
                <label for="">Change Password</label>
                <input type="password" class="form-control mb-1" placeholder="current password">
                <input type="password" class="form-control mb-1" placeholder="new password" name="password">
                <input type="password" class="form-control mb-1" placeholder="repeat password" name="password_confirmation">
           </div>
           <div class="mt-2 text-end">
                <button class="btn btn-primary">Save</button>
           </div>
            
        </form>
    </div>
</div>