@extends('admin.mainComponents')

@section('title', 'تعديل تصنيف الاساسي')


@section('link_one', 'التصنيفات')
@section('link_two', 'تعديل تصنيف')


@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

 <!-- Update Form -->
 <form action="{{ route('admin.categories.update', $category->id) }}" class="bg-light p-3 rounded" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Category Name -->
        <div class="mb-3">
            <label for="category_name" style="font-weight: 600; font-size: 18px" class="form-label">اسم التصنيف</label>
            <input type="text" class="form-control" id="category_name" name="name" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Ad Image -->
        <div class="mb-3">
            <label for="image" style="font-weight: 600; font-size: 18px" class="form-label">صورة الإعلان</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Display current image -->
            @if ($category->image)
                <div class="mt-2">
                    <img src="{{ $category->image }}" alt="{{ $category->name }}" style="max-width: 200px;">
                </div>
            @endif
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">إلغاء</a>
    </form>
@endsection

