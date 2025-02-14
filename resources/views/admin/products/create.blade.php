@extends('admin.mainComponents')

@section('title', 'إنشاء منتج جديد')

@section('link_one', 'المنتجات')
@section('link_two', 'إنشاء منتج')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <!-- Create Form -->
    <form action="{{ route('admin.products.store') }}" class="bg-light p-3 rounded" method="POST">
        @csrf

        <!-- Product Title -->
        <div class="mb-3">
            <label for="title" style="font-weight: 600; font-size: 18px" class="form-label">عنوان المنتج</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Description -->
        <div class="mb-3">
            <label for="description" style="font-weight: 600; font-size: 18px" class="form-label">وصف المنتج</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-3">
            <label for="price" style="font-weight: 600; font-size: 18px" class="form-label">السعر</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price') }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Subcategory Dropdown -->
        <div class="mb-3">
            <label for="subcategory_id" style="font-weight: 600; font-size: 18px" class="form-label">التصنيف الفرعي</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                <option value="">اختر التصنيف الفرعي</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
            @error('subcategory_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">حفظ</button>
        <a href="{{ route('admin.products') }}" class="btn btn-secondary">إلغاء</a>
    </form>
@endsection