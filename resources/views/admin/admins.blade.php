@extends('admin.dashboard')

@section('title', 'settings | admins')

@section('admin-main-content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">add admin</button>
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                <h2 class="modal-title">Admin form</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
                <div class="modal-body">
                    <x-form-component :action="route('dashboard')" method="POST" buttonText="Add Admin">
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                      <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="" id="" class="form-select" name="role">
                            <option value="super admin">Super admin</option>
                            <option value="sub admin">Sub admin</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                      <div class="mb-3">
                        <label for="confirm" class="form-label">Repeat password</label>
                        <input type="pasword" class="form-control" name="confirm_password">
                      </div>
                    </x-form-component>
                </div>
            </div>
        </div>
    </div>
@endsection


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Open Popup
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Popup Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        This is the content of the popup (modal).
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
