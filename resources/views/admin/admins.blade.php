@extends('admin.dashboard')

@section('title', 'settings | admins')

@section('admin-main-content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal" id="addAdmin">add admin</button>
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

    <!-- admin table -->
  <table class="table mt-5 table-hover table-striped table-sm">
      <tr class="table-dark">
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            @if(Auth::user()->role =='super admin')
            <th>Action</th>
            @endif
      </tr>
      @foreach($admins as $admin)
      <tr>
          <td>{{$admin['name']}}</td>
          <td>{{$admin['email']}}</td>
          <td>{{$admin->role}}</td>

          @if(Auth::user()->role =='super admin')
          <td>
           <button class="btn btn-primary adminEditBtn"
              data-id="{{$admin->id}}"
              data-name="{{$admin->name}}"
              data-email="{{$admin->email}}"
              data-role="{{$admin->role}}"
            >Edit</button>
            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        @endif
      </tr>
      @endforeach
  </table>

@vite(['resources/js/adminForm.js'])
@endsection




