@extends('admin.template')
@section('content')
<!-- Hoverable Table rows -->
<div class="card">
    <div class="row">
        <div class="col-md-2">
            <h5 class="card-header">Categories List</h5>
        </div>

        <div class="col-md-8"></div>

        <div class="col-md-2 mt-3">
            <a href="{{URL('/admin/categories/add')}}" class="btn btn-primary">Add Category</a>
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $count = 1;
                @endphp
                @foreach($categories as $category)
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->isActive == "1")
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
                                <a class="dropdown-item" href="{{URL('/admin/categories/edit/'.$category->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form class="delete" action="{{URL('/admin/categories/delete/'.$category->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

                @php
                    $count++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Hoverable Table rows -->
@endsection