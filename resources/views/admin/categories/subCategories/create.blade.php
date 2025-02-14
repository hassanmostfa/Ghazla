@extends('admin.mainComponents')

@section('title', 'إنشاء تصنيف فرعي جديد')

@section('link_one', 'التصنيفات')
@section('link_two', 'إنشاء تصنيف فرعي')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<!-- Create Form -->
<form action="{{ route('admin.subCategories.store') }}" class="bg-light p-3 rounded" method="POST">
    @csrf

    <!-- SubCategory Name -->
    <div class="mb-3">
        <label for="subCategory_name" style="font-weight: 600; font-size: 18px" class="form-label">اسم التصنيف الفرعي</label>
        <input type="text" class="form-control" id="subCategory_name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Category Name (Dropdown) -->
    <div class="mb-3">
        <label for="category_name" style="font-weight: 600; font-size: 18px" class="form-label">اسم التصنيف الرئيسي</label>
        
        <select class="form-control" id="category_name" name="category_id" required>
            <option value="" selected disabled>اختر تصنيف</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        
        @error('category_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">حفظ </button>
        <a href="{{ route('admin.subCategories') }}" class="btn btn-secondary">إلغاء</a>
    </form>





@endSection
