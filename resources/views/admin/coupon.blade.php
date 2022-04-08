@extends('admin/layout')
@section('page_title', 'Coupon')
@section('coupon_select', 'active')


@section('container')

    <div class="py-4">

        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h3 class="mg10">Coupon</h3>
        <a href="{{ url('admin/coupon/manage_coupon') }}">
            <button type="submit" class="btn btn-success">
                Add Coupon
            </button>
        </a>

        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Value</th>

                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->code }}</td>
                            <td>{{ $list->value }}</td>
                            <td>
                                <a href="{{ url('admin/coupon/delete') }}/{{ $list->id }}">
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </a>
                                @if ($list->status == 1)
                                    <a href="{{ url('admin/coupon/status/0') }}/{{ $list->id }}">
                                        <button class="btn btn-primary">
                                            Active
                                        </button>
                                    </a>
                                @elseif ($list->status == 0)
                                    <a href="{{ url('admin/coupon/status/1') }}/{{ $list->id }}">
                                        <button class="btn btn-warning">
                                            Deactive
                                        </button>
                                    </a>
                                @endif
                                <a href="{{ url('admin/coupon/manage_coupon') }}/{{ $list->id }}">
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
