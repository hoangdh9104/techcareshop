@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sản phẩm</h1>
        </div>
        <div class="mb-3">
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Quay lại</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cập nhật sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Ảnh hiện tại</label>
                                    <br>
                                    <img src="{{ asset($product->thumb_image) }}" style="width:200px" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Danh mục</label>
                                            <select id="inputState" class="form-control main-category" name="category">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Danh mục phụ</label>
                                            <select id="inputState" class="form-control sub-category" name="sub_category">
                                                <option value="">Select</option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option
                                                        {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}
                                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Danh mục con</label>
                                            <select id="inputState" class="form-control child-category"
                                                name="child_category">
                                                <option value="">Select</option>
                                                @foreach ($childCategories as $childCategory)
                                                    <option
                                                        {{ $childCategory->id == $product->child_category_id ? 'selected' : '' }}
                                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="inputState">Thương hiệu</label>
                                    <select id="inputState" class="form-control" name="brand">
                                        <option value="">Select</option>
                                        @foreach ($brands as $brand)
                                            <option {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                                value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name="sku" value="{{ $product->sku }}">
                                </div>

                                <div class="form-group">
                                    <label for="warranty_duration">Thời gian bảo hành</label>
                                    <select name="warranty_duration" class="form-control" id="warranty_duration">
                                        <option value="3">3 tháng</option>
                                        <option value="6">6 tháng</option>
                                        <option value="9">9 tháng</option>
                                        <option value="12">12 tháng</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="text" class="form-control" name="price"
                                        value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input type="text" class="form-control" name="offer_price"
                                        value="{{ $product->offer_price }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu</label>
                                            <input type="text" class="form-control datepicker" name="offer_start_date"
                                                value="{{ $product->offer_start_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ngày kết thúc</label>
                                            <input type="text" class="form-control datepicker" name="offer_end_date"
                                                value="{{ $product->offer_end_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tồn kho</label>
                                    @if ($product->variantCombinations->count() > 0)
                                        {{-- Nếu đã có biến thể: hiện số lượng = tổng số lượng của biến thể, không cho sửa --}}
                                        <input type="number" class="form-control"
                                            value="{{ $product->variantCombinations->sum('quantity') }}" readonly>
                                    @else
                                        {{-- Nếu chưa có biến thể: cho phép nhập số lượng --}}
                                        <input type="number" min="0" name="qty" class="form-control"
                                            value="{{ $product->qty }}">
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>Video Link</label>
                                    <input type="text" class="form-control" name="video_link"
                                        value="{{ $product->video_link }}">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="short_description" class="form-control">{!! $product->short_description !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả chi tiết</label>
                                    <textarea name="long_description" class="form-control summernote">{!! $product->long_description !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Loại</label>
                                    <select id="inputState" class="form-control" name="product_type">
                                        <option value="">Select</option>
                                        <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}
                                            value="new_arrival">Hàng mới về</option>
                                        <option {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                                            value="featured_product">Sản phẩm nổi bật</option>
                                        <option {{ $product->product_type == 'top_product' ? 'selected' : '' }}
                                            value="top_product">Sản phẩm bán chạy</option>
                                        <option {{ $product->product_type == 'best_product' ? 'selected' : '' }}
                                            value="best_product">Sản phẩm tốt nhất</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Seo tiêu đề</label>
                                    <input type="text" class="form-control" name="seo_title"
                                        value="{{ $product->seo_title }}">
                                </div>

                                <div class="form-group">
                                    <label>Seo Mô tả</label>
                                    <textarea name="seo_description" class="form-control">{!! $product->seo_description !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Trạng thái</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Inactive
                                        </option>
                                    </select>
                                </div>
                                <button type="submmit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            $('body').on('change', '.main-category', function(e) {
                // nếu thay đổi danh mục cha category, child category will be reset
                $('.child-category').html('<option value="">Select</option>')
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
            // get child-categories
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-child-categories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.child-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
