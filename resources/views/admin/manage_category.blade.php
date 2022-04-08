@extends('admin/layout')
@section('category_select','active')


@section('container')
    <div class="py-4">
        <h3 class="mg10">Manage Category</h3>
        <a href="{{url('admin/category')}}">
            <button type="submit" class="btn btn-success">
                Back
            </button>
        </a>
    </div>
    <div class="col-lg-12">
     
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.manage_category_process') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('category_name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_slug" class="control-label mb-1">Category slug</label>
                        <input id="category_slug" name="category_slug" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('category_slug')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
