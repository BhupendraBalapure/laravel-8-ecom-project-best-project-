@extends('admin/layout')
@section('page_title', 'Manage Product')
@section('product_select', 'active')

@if ($id > 0)
    {{ $image_required = '' }}
@else
    {{ $image_required = 'required' }}
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
                            aria-required="true" aria-invalid="false">

                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="control-label mb-1">image</label>
                        <input id="image" value="{{ $image }}" name="image" type="file" {{ $image_required }}>

                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="category_id" class="control-label mb-1">category</label>
                                <select id="category_id" name="category_id" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false">

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
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="slug" class="control-label mb-1">slug</label>
                                <input id="name" value="{{ $slug }}" name="slug" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false">

                                @error('slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="brand" class="control-label mb-1">brand</label>
                                <input id="name" value="{{ $brand }}" name="brand" type="text"
                                    class="form-control" aria-required="true" aria-invalid="false">

                                @error('brand')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="model" class="control-label mb-1">model</label>
                        <input id="name" value="{{ $model }}" name="model" type="text" class="form-control"
                            aria-required="true" aria-invalid="false">

                        @error('model')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="short_desc" class="control-label mb-1">short_desc</label>
                        <input id="name" value="{{ $short_desc }}" name="short_desc" type="text" class="form-control"
                            aria-required="true" aria-invalid="false">

                        @error('short_desc')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc" class="control-label mb-1">desc</label>
                        <input id="desc" value="{{ $desc }}" name="desc" type="text" class="form-control"
                            aria-required="true" aria-invalid="false">

                        @error('desc')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keyword" class="control-label mb-1">keyword</label>
                        <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control"
                            aria-required="true" aria-invalid="false">

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
                            aria-invalid="false">

                        @error('technical_specification')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="uses" class="control-label mb-1">uses</label>
                        <input id="technical_specification" value="{{ $uses }}" name="uses" type="text"
                            class="form-control" aria-required="true" aria-invalid="false">

                        @error('uses')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="warranty" class="control-label mb-1">warranty</label>
                        <input id="warranty" value="{{ $warranty }}" name="warranty" type="text" class="form-control"
                            aria-required="true" aria-invalid="false">

                        @error('warranty')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12" id="product_attr_box">
        <div class="card" id="product_attr_1">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="sku" class="control-label mb-1">sku</label>
                            <input id="sku" name="sku" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">

                            @error('sku')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="mrp" class="control-label mb-1">MRP</label>
                            <input id="mrp" name="mrp" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">

                            @error('mrp')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="price" class="control-label mb-1">Price</label>
                            <input id="price" name="price" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">

                            @error('price')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="size_id" class="control-label mb-1">Size</label>
                            <select id="size_id" name="size_id" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">
                                <option value="">Select</option>
                                @foreach ($sizes as $list)
                                    <option value="{{ $list->id }}">{{ $list->size }}</option>
                                @endforeach
                            </select>
                            @error('size_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="color_id" class="control-label mb-1">Color</label>
                            <select id="color_id" name="color_id" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">
                                @foreach ($colors as $list)
                                    <option value="">Select</option>
                                    <option value="{{ $list->id }}">{{ $list->color }}</option>
                                @endforeach
                            </select>

                            @error('color_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="qty" class="control-label mb-1">Qty</label>
                            <input id="qty" name="qty" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">

                            @error('qty')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="image" class="control-label mb-1">image</label>
                            <input id="image" value="{{ $image }}" name="image" type="file"
                                {{ $image_required }}>

                            @error('image')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <br>
                            <button type="button" class="btn btn-success btn-lg" onclick="add_more()">
                                <i class="fa fa-plus"></i>Add
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
        Submit
    </button>
    <input type="hidden" name="id" value="{{ $id }}">
    </form>
    <script>
        var loop_count = 1;

        function add_more() {
            loop_count++;
            // alert('f');
            var html = '<div class="card"><div id="product_attr_' + loop_count + '" class="card-body"><div class="row">';
            html +=
                ' <div class="col-sm-2"><div class="form-group"> <label for="sku" class="control-label mb-1">sku</label><input id="sku" name="sku" type="text" class="form-control" aria-required="true"aria-invalid="false"></div></div>';

            html +=
                ' <div class="col-sm-2"><div class="form-group"> <label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp" type="text" class="form-control" aria-required="true"aria-invalid="false"></div></div>';

            html +=
                ' <div class="col-sm-2"><div class="form-group"> <label for="price" class="control-label mb-1">Price</label><input id="price" name="price" type="text" class="form-control" aria-required="true"aria-invalid="false"></div></div>';

            var size_id_html = jQuery('#size_id').html();
            // alert(size_id_html);
            html +=
                ' <div class="col-sm-2"><div class="form-group"> <label for="size_id" class="control-label mb-1">Size</label><select id="size_id" name="size_id" type="text" class="form-control" aria-required="true"><option">' +
                size_id_html + '</option></select></div></div>';

            var color_id_html = jQuery('#color_id').html();
            html +=
                ' <div class="col-sm-3"><div class="form-group"> <label for="color_id" class="control-label mb-1">Color</label><select id="color_id" name="color_id" type="text" class="form-control" aria-required="true"><option">' +
                color_id_html + '</option></select></div></div>';


            html +=
                ' <div class="col-sm-2"><div class="form-group"> <label for="qty" class="control-label mb-1">QTY</label><input id="qty" name="qty" type="text" class="form-control" aria-required="true"aria-invalid="false"></div></div>';



            html +=
                ' <div class="col-sm-4"><div class="form-group"> <label for="attr_image" class="control-label mb-1">Image</label><input id="attr_image" name="attr_image" type="file" class="form-control" aria-required="true"aria-invalid="false"></div></div>';

            html += '<button type="button" class="btn btn-danger btn-sm" onclick=remove_more("' + loop_count +'")><i class="fa fa-minus"></i>Remove</button>';

            html += '</div></div></div>';
            jQuery('#product_attr_box').append(html);
        }

        function remove_more(loop_count) {
            jQuery('#product_attr_' + loop_count).remove();
        }
    </script>
    </div>


@endsection
