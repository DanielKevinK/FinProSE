@extends('admin/components/layout')

@section('page-title', 'Category')

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
                <table id="datatables-basic-category" class="datatables-basic-category table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Link</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                      <td><i class="text-left"></i><strong>{{ $category->id }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $category->name }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $category->link }}</strong></td>
                      <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                          <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="pull-up" title="Lilian Fuller">
                            <img width="75px" height="75px" src="/storage/{{ $category->image }}" alt="image-category">
                          </li>
                        </ul>
                      </td>
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
          @foreach ($categories as $index => $category)
          <!-- Modal Edit category -->
          <div class="modal modal-slide-in fade" id="modals-edit-{{$category->id}}">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('category-edit', $category->id) }}" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Record {{ $category->name }}</h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <div class="mb-1">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('categories.'.$index.'.name', $category->name) }}" id="name" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="link">Link</label>
                    <input type="text" name="link" class="form-control" value="{{ old('categories.'.$index.'.link', $category->link) }}" id="link" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" />
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Edit category -->
          @endforeach
          <!-- Modal to add new record -->
          <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('category-add') }}" enctype="multipart/form-data">
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
                    <label class="form-label" for="link">Link</label>
                    <input type="text" name="link" class="form-control" id="link" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" />
                    <small>Upload Image For Change Image Product</small>
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Delete category -->
          <div class="modal fade" id="modalDeletecategory" tabindex="-1" aria-labelledby="modalDeletecategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-danger">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">Category Berhasil Dihapus!</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Delete category -->
          <!-- Modal Add category -->
          <div class="modal fade" id="modalAddcategory" tabindex="-1" aria-labelledby="modalAddcategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">Category Berhasil Ditambahkan</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Add category -->
          <!-- Modal Edit category -->
          <div class="modal fade" id="modalEditcategory" tabindex="-1" aria-labelledby="modalAddcategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">{{session('successEdit') }}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Edit category -->
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
    $('#modalDeletecategory').modal('show');
  });
</script>
@elseif(session('successAdd'))
<script>
  $(document).ready(function() {
    $('#modalAddcategory').modal('show');
  });
</script>
@elseif(session('successEdit'))
<script>
  $(document).ready(function() {
    $('#modalEditcategory').modal('show');
  });
</script>
@endif
<!--/ Page layout -->
@endsection