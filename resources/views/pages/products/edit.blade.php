@extends('layouts.app')

@section('title', 'Edit Products')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Products</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Products</h2>



                <div class="card">
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $product->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"
                                    name="description" value="{{ $product->description }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number"
                                    class="form-control @error('price')
                                is-invalid
                            @enderror"
                                    name="price" value="{{ $product->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number"
                                    class="form-control @error('stock')
                                is-invalid
                            @enderror"
                                    name="stock" value="{{ $product->stock }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select name="category_id" id=""
                                    class="form-control selectric @error('category_id')
                                   is-invalid
                               @enderror">
                                    <option value="">Choose Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Status</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label for="" class="selectegroup-item">
                                        <input type="radio" name="status" value="1" id=""
                                            class="selectgroup-input" {{ $product->status == 1 ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label for="" class="selectegroup-item">
                                        <input type="radio" name="status" value="0" id=""
                                            class="selectgroup-input" {{ $product->status == 0 ? 'checked' : '' }}>
                                        <span class="selectgroup-button">InActive</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Photo Product</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="" class="form-control"
                                        @error('image')
                                        is-invalid
                                    @enderror>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Is Favorite</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label for="" class="selectegroup-item">
                                        <input type="radio" name="is_favorite" value="1" id=""
                                            class="selectgroup-input" {{ $product->is_favorite == 1 ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Ya</span>
                                    </label>
                                    <label for="" class="selectegroup-item">
                                        <input type="radio" name="is_favorite" value="0" id=""
                                            class="selectgroup-input" {{ $product->is_favorite == 0 ? 'checked' : '' }}>
                                        <span class="selectgroup-button">No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
