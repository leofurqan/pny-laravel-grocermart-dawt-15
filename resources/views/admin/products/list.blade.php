@extends('admin.template')
@section('content')
<!-- Hoverable Table rows -->
<div class="card">
    <div class="row">
        <div class="col-md-2">
            <h5 class="card-header">Products List</h5>
        </div>

        <div class="col-md-8"></div>

        <div class="col-md-2 mt-3">
            <a href="{{route('products.create')}}" class="btn btn-primary">Add Product</a>
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img width="100px" src="{{asset('uploads/'.$product->image)}}" /></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->categories->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        @if($product->status == "1")
                        <span class="badge bg-label-success me-1">Active</span>
                        @else
                        <span class="badge bg-label-danger me-1">In Active</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{URL('/admin/categories/edit/'.$product->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form class="delete" action="{{URL('/admin/categories/delete/'.$product->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Hoverable Table rows -->
@endsection