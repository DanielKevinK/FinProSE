@extends('admin/components/layout')

@section('page-title', 'Product')

@section('content')
<!-- Page layout -->
<div class="card">
  <div class="card-body">
    <div class="card">
      <!-- <button class="normal" data-bs-toggle="modal" data-bs-target="#modals-slide-in">Add New Record</button> -->
      <div class="table-responsive text-black">
        <!-- <table class="table card-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td><i class="text-left"></i><strong>{{ $product->name }}</strong></td>
              <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="pull-up" title="Lilian Fuller">
                    <img width="75px" height="75px" src="/storage/{{ $product->image }}" alt="image-product">
                  </li>
                </ul>
              </td>
              <td>{{ $product->description }}</td>
              @if($product->category == 'beans')
              <td><span class="badge bg-primary me-1">{{ $product->category }}</span></td>
              @elseif($product->category == 'rice')
              <td><span class="badge bg-primary me-1">{{ $product->category }}</span></td>
              @else
              <td><span class="badge bg-warning me-1">{{ $product->category }}</span></td>
              @endif
              <td><span class="me-1">Rp. {{ $product->price }}</span></td>
              <td><span class="me-1">{{ $product->stock }}</span></td>
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
        </table> -->
        <section id="basic-datatable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <table id="table-products" class="datatables-basic table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <td><i class="text-left"></i><strong>{{ $product->id }}</strong></td>
                      <td><i class="text-left"></i><strong>{{ $product->name }}</strong></td>
                      <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                          <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="pull-up" title="Lilian Fuller">
                            <img width="75px" height="75px" src="/storage/{{ $product->image }}" alt="image-product">
                          </li>
                        </ul>
                      </td>
                      <td>{{ $product->description }}</td>
                      @if($product->category == 'beans')
                      <td><span class="badge bg-primary me-1">{{ $product->category }}</span></td>
                      @elseif($product->category == 'rice')
                      <td><span class="badge bg-success me-1">{{ $product->category }}</span></td>
                      @elseif($product->category == 'fruit')
                      <td><span class="badge bg-warning me-1">{{ $product->category }}</span></td>
                      @elseif($product->category == 'tea')
                      <td><span class="badge bg-danger me-1">{{ $product->category }}</span></td>
                      @elseif($product->category == 'bread')
                      <td><span class="badge bg-info me-1">{{ $product->category }}</span></td>
                      @else
                      <td><span class="badge bg-dark me-1">{{ $product->category }}</span></td>
                      @endif
                      <td><span class="me-1">Rp. {{ $product->price }}</span></td>
                      <td><span class="me-1">{{ $product->stock }}</span></td>
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
          @foreach ($products as $index => $product)
          <!-- Modal Edit Product -->
          <div class="modal modal-slide-in fade" id="modals-edit-{{$product->id}}">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('product-edit', $product->id) }}" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Record {{ $product->name }}</h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <div class="mb-1">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('products.'.$index.'.name', $product->name) }}" id="name" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="category">Category</label>
                    <select class="form-select" name="category" id="category" value="{{ old('products.'.$index.'.category', $product->category) }}" aria-label="Category">
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}" {{ old('category.'.$index.'.category', $product->category) == $category->slug ? 'selected' : '' }}>{{$category->name}}</option>
                      @endforeach
                      <!-- <option value="beans" {{ old('products.'.$index.'.category', $product->category) == 'beans' ? 'selected' : '' }}>Beans</option>
                      <option value="rice" {{ old('products.'.$index.'.category', $product->category) == 'rice' ? 'selected' : '' }}>Rice</option>
                      <option value="tea" {{ old('products.'.$index.'.category', $product->category) == 'tea' ? 'selected' : '' }}>Tea & Coffee</option>
                      <option value="bread" {{ old('products.'.$index.'.category', $product->category) == 'bread' ? 'selected' : '' }}>Bread & Egg</option>
                      <option value="vegetables" {{ old('products.'.$index.'.category', $product->category) == 'vegetables' ? 'selected' : '' }}>Vegetable</option>
                      <option value="fruit" {{ old('products.'.$index.'.category', $product->category) == 'fruit' ? 'selected' : '' }}>Fruit</option> -->
                    </select>
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="description">Description</label>
                    <input type="longtext" name="description" id="description" value="{{ old('products.'.$index.'.description', $product->description) }}" class="form-control" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" />
                    <small>Upload Image For Change Image Product</small>
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ old('products.'.$index.'.stock', $product->stock) }}" class="form-control" />
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="price">Price (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('products.'.$index.'.price', $product->price) }}" class="form-control" />
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Edir Product -->
          @endforeach
          <!-- Modal to add new record -->
          <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
              <form class="add-new-record modal-content pt-0" method="POST" action="{{ route('product-add') }}" enctype="multipart/form-data">
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
                    <label class="form-label" for="category">Category</label>
                    <select class="form-select" name="category" id="category" aria-label="Category">
                      <option selected>Open this select menu</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->slug}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="description">Description</label>
                    <input type="longtext" name="description" id="description" class="form-control" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" />
                  </div>
                  <div class="mb-1">
                    <label class="form-label" for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" />
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="price">Price (Rp)</label>
                    <input type="number" name="price" id="price" class="form-control" />
                  </div>
                  <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Delete Product -->
          <div class="modal fade" id="modalDeleteProduct" tabindex="-1" aria-labelledby="modalDeleteProductLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-danger">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">Produk Berhasil Dihapus!</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Delete Product -->
          <!-- Modal Add Product -->
          <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="modalAddProductLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="fw-bold">Produk Berhasil Ditambahkan</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Add Product -->
          <!-- Modal Edit Product -->
          <div class="modal fade" id="modalEditProduct" tabindex="-1" aria-labelledby="modalAddProductLabel" aria-hidden="true">
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
    $('#modalDeleteProduct').modal('show');
  });
</script>
@elseif(session('successAdd'))
<script>
  $(document).ready(function() {
    $('#modalAddProduct').modal('show');
  });
</script>
@elseif(session('successEdit'))
<script>
  $(document).ready(function() {
    $('#modalEditProduct').modal('show');
  });
</script>
@endif
<!--/ Page layout -->
@endsection