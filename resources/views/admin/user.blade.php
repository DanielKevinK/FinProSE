@extends('admin/components/layout')

@section('page-title', 'User')

@section('content')
<!-- Page layout -->
<div class="card">
  <div class="card-body">
    <div class="card">
      <div class="table-responsive text-black">
        <section id="basic-datatable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <table id="table-users" class="datatables-basic-user table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td><i class="text-left"></i><strong>{{ $user->id }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $user->name }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $user->username }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $user->email }}</strong></td>
                      @if($user->role == 'admin')
                      <td><span class="badge bg-primary me-1">{{ $user->role }}</span></td>
                      @else
                      <td><span class="badge bg-warning me-1">{{ $user->role }}</span></td>
                      @endif
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-2"></i>Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-2"></i>Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @foreach ($users as $index => $user)
          <!-- Modal Edit User -->
          <div class="modal modal-slide-in fade" id="modals-edit-{{$user->id}}">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('user-edit', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Record {{ $user->name }}</h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <div class="mb-1">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('users.'.$index.'.name', $user->name) }}" id="name" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('users.'.$index.'.name', $user->username) }}" id="username" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('users.'.$index.'.name', $user->email) }}" id="email" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-select" name="role" id="role" value="{{ old('users.'.$index.'.role', $user->role) }}" aria-label="Role">
                      <!-- <option selected>Open this select menu</option> -->
                      <option value="admin" {{ old('users.'.$index.'.role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                      <option value="user" {{ old('users.'.$index.'.role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                    <small>Fill To Update Password!</small>
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Edit User -->
          @endforeach
          <!-- Modal to add new record -->
          <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('user-add') }}" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <div class="mb-1">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-select" name="role" id="role" aria-label="role">
                      <option selected>Open this select menu</option>
                      <option value="admin">Admin</option>
                      <option value="user">User</option>
                    </select>
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Delete Product -->
          <div class="modal fade" id="modalDeleteUser" tabindex="-1" aria-labelledby="modalDeleteUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-danger">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">User Berhasil Dihapus!</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Delete Product -->
          <!-- Modal Add Product -->
          <div class="modal fade" id="modalAddUser" tabindex="-1" aria-labelledby="modalAddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">User Berhasil Ditambahkan</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Add Product -->
          <!-- Modal Edit Product -->
          <div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="modalEditUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">{{session('successEdit') }}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Edit Product -->
        </section>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@if(session('success'))
<script>
  $(document).ready(function() {
    console.log('READY')
    $('#modalDeleteUser').modal('show');
  });
</script>
@elseif(session('successAdd'))
<script>
  $(document).ready(function() {
    $('#modalAddUser').modal('show');
  });
</script>
@elseif(session('successEdit'))
<script>
  $(document).ready(function() {
    $('#modalEditUser').modal('show');
  });
</script>
@endif
<!--/ Page layout -->
@endsection