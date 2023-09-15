@extends('admin.template')
@section('content')
<!-- Basic Layout -->
<div class="row">
    <div class="col-md-12">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Products</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Product Name</label>
                            <input type="text" name="name" class="form-control" id="basic-default-fullname" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-company">Select Category</label>
                            <select class="form-select" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Product Price</label>
                            <input type="number" name="price" class="form-control" id="basic-default-fullname" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-company">Product Description</label>
                            <textarea rows="5" name="description" class="form-control" id="basic-default-company"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-company">Product Image</label>
                            <input type="file" class="form-control" name="image" />
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" value="1" checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Product Status</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection