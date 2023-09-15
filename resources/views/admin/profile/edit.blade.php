@extends('admin.template')
@section('content')
<div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <div class="card-body">
        <form method="POST" action="{{URL('/admin/profile')}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Name</label>
                    <input class="form-control" type="text" id="firstName" name="name" value="{{Auth::user()->name}}" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{Auth::user()->email}}" placeholder="john.doe@example.com" />
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
    <!-- /Account -->
</div>
@endsection