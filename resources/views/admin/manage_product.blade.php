@extends('admin/layout')
@section('page_title', 'Manage Product')
@section('product_select', 'active')

@if ($id>0)
    {{$image_required=""}}
    @else
    {{$image_required="required"}}
@endif

@section('container')
    <div class="py-4">
        <h3 class="mg10">Manage product</h3>
        <a href="{{ url('admin/product') }}">
            <button type="submit" class="btn btn-success">
                Back
            </button>
        </a>
    </div>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.manage_product_process') }}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">name</label>
                        <input id="name" value="{{ $name }}" name="name" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id" class="control-label mb-1">category</label>
                        <select id="category_id" name="category_id" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" required>

                            <option value="">Select Category</option>
                            @foreach ($category as $list)
                                @if ($category_id == $list->id)
                                    <option selected value="{{ $list->id }}">
                                    @else
                                    <option value="{{ $list->id }}">
                                @endif
                                {{ $list->category_name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug" class="control-label mb-1">slug</label>
                        <input id="name" value="{{ $slug }}" name="slug" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('slug')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="control-label mb-1">image</label>
                        <input id="image" value="{{ $image }}" name="image" type="file" {{$image_required}}>

                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="brand" class="control-label mb-1">brand</label>
                        <input id="name" value="{{ $brand }}" name="brand" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('brand')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="model" class="control-label mb-1">model</label>
                        <input id="name" value="{{ $model }}" name="model" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('model')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="short_desc" class="control-label mb-1">short_desc</label>
                        <input id="name" value="{{ $short_desc }}" name="short_desc" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('short_desc')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc" class="control-label mb-1">desc</label>
                        <input id="desc" value="{{ $desc }}" name="desc" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('desc')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keyword" class="control-label mb-1">keyword</label>
                        <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('keyword')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="technical_specification" class="control-label mb-1">technical_specification</label>
                        <input id="technical_specification" value="{{ $technical_specification }}"
                            name="technical_specification" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" required>

                        @error('technical_specification')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="uses" class="control-label mb-1">uses</label>
                        <input id="technical_specification" value="{{ $uses }}" name="uses" type="text"
                            class="form-control" aria-required="true" aria-invalid="false" required>

                        @error('uses')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="warranty" class="control-label mb-1">warranty</label>
                        <input id="warranty" value="{{ $warranty }}" name="warranty" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>

                        @error('warranty')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
            </div>
            <input type="hidden" name="id" value="{{ $id }}">
            </form>
        </div>
    </div>
    </div>
@endsection
