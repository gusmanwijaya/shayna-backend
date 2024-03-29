@extends('layouts.default')

@section('title')
    Create Photo | ShaynaAdmin
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id" id="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        <option value=""></option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('products_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input type="file" name="photo" id="photo" value="{{ old('photo') }}" accept="image/*" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <label class="form-control-label">Jadikan Default</label>

                <div class="form-group">
                    <div class="form-check">
                        <input type="radio" name="is_default" id="is_default" value="1" class="form-check-input @error('is_default') is-invalid @enderror">
                        <label class="form-check-label">Ya</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="is_default" id="is_default" value="0" class="form-check-input @error('is_default') is-invalid @enderror">
                        <label class="form-check-label">Tidak</label>
                    </div>

                    @error('is_default')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Foto Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection