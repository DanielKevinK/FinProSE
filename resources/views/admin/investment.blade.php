@extends('admin/components/layout')

@section('page-title', 'Investment')

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
                <table id="table-investments" class="datatables-basic-investment table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Investor</th>
                      <th>Product</th>
                      <th>Commision</th>
                      <th>Income</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($investments as $investment)
                    <tr>
                      <td><i class="text-left"></i><strong>{{ $investment['id'] }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $investment['investor'] }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $investment['product'] }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $investment['commission'] }}%</strong></td>
                      <td><i class="text-left"></i><strong>Rp. {{ $investment['income'] }}</strong></td>
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
          @foreach ($investments as $index => $investment)
          <!-- Modal Edit investment -->
          <div class="modal modal-slide-in fade" id="modals-edit-{{$investment['id']}}">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('investment-edit', $investment['id']) }}">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <div class="mb-1">
                    <label class="form-label" for="name">Commission</label>
                    <input type="text" class="form-control" value="{{ old('investments.'.$index.'.commission', $investment['commission']) }}" name="commission" id="commission" />
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Edir investment -->
          @endforeach
          <!-- Modal to add new record -->
          <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('investment-add') }}">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <div class="mb-1">
                    <h5>User Information</h5>
                  </div>
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
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" />
                  </div>
                  <hr>
                  <div class="mb-1">
                    <h5>Investment Information</h5>
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="product_id">Product</label>
                    <select class="form-select" name="product_id" id="product_id" aria-label="Category">
                      <option selected>Open this select menu</option>
                      @foreach ($products as $product)
                      <option value="{{$product->id}}">{{$product->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="commission">Commission in (%)</label>
                    <input type="number" name="commission" id="commission" class="form-control" />
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Delete investment -->
          <div class="modal fade" id="modalDeleteinvestment" tabindex="-1" aria-labelledby="modalDeleteinvestmentLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-danger">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">{{session('success')}}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Delete investment -->
          <!-- Modal Add investment -->
          <div class="modal fade" id="modalAddinvestment" tabindex="-1" aria-labelledby="modalAddinvestmentLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">{{session('successAdd')}}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Add investment -->
          <!-- Modal Edit investment -->
          <div class="modal fade" id="modalEditinvestment" tabindex="-1" aria-labelledby="modalEditinvestmentLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">{{session('successEdit')}}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Edit investment -->
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
    $('#modalDeleteinvestment').modal('show');
  });
</script>
@elseif(session('successAdd'))
<script>
  $(document).ready(function() {
    $('#modalAddinvestment').modal('show');
  });
</script>
@elseif(session('successEdit'))
<script>
  $(document).ready(function() {
    $('#modalEditinvestment').modal('show');
  });
</script>
@endif
<!--/ Page layout -->
@endsection