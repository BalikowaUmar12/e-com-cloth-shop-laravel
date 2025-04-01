@extends('admin.dashboard')

@section('title', 'category')

@section('admin-main-content')
<div class="d-flex justify-content-between">
<h3>Categories</h3>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal" id="addAdmin">add category</button>

</div>
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                <h2 class="modal-title">Admin form</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
                <div class="modal-body">
                    <x-form-component :action="route('admin.store')" method="POST" buttonText="Add Admin" formId="adminForm">
                    @csrf 
                      <input type="hidden" name="_method" value="POST">
                      <input type="hidden" id="adminId" name="adminId">
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                      </div>
                      <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
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
                        <input type="password" class="form-control" name="password_confirmation">
                      </div>
                    </x-form-component>
                </div>
            </div>
        </div>
    </div>



@endsection