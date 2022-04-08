@extends('admin/layout')
@section('page_title', 'Product')
@section('product_select', 'active')

@section('container')

    <div class="py-4">
        <!-- <div class="alert alert-success" role="alert"> -->
        <!-- </div> -->

        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <h3 class="mg10">Product</h3>
        <a href="{{ url('admin/product/manage_product') }}">
            <button type="submit" class="btn btn-success">
                Add Product
            </button>
        </a>

        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Image</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->slug }}</td>
                            <td>
                                @if ($list->image !='')
                                <img src="{{asset('storage/media/'.$list->image)}}" width="100px" alt="">
                                @endif
                            </td>
                            <td>{{ $list->status }}</td>

                            <td>
                                <a href="{{ url('admin/product/delete') }}/{{ $list->id }}">
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </a>
                                @if ($list->status == 1)
                                    <a href="{{ url('admin/product/status/0') }}/{{ $list->id }}">
                                        <button class="btn btn-primary">
                                            Active
                                        </button>
                                    </a>
                                @elseif ($list->status == 0)
                                    <a href="{{ url('admin/product/status/1') }}/{{ $list->id }}">
                                        <button class="btn btn-warning">
                                            Deactive
                                        </button>
                                    </a>
                                @endif
                                <a href="{{ url('admin/product/manage_product') }}/{{ $list->id }}">
                                    <button class="btn btn-success">
                                        Edit
                                    </button>
                                </a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection
