@extends('admin.mainComponents')

@section('title', 'تعديل إعلان')

@section('link_one', 'الإعلانات')
@section('link_two', 'تعديل إعلان')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('admin.ads.update', $ad->id) }}" class="bg-light p-3 rounded" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Ad Title -->
        <div class="mb-3">
            <label for="title" style="font-weight: 600; font-size: 18px" class="form-label">عنوان الإعلان</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $ad->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ad Link -->
        <div class="mb-3">
            <label for="link" style="font-weight: 600; font-size: 18px" class="form-label">رابط الإعلان</label>
            <input type="url" class="form-control" id="link" name="link" value="{{ old('link', $ad->link) }}" required>
            @error('link')
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
            @if ($ad->image)
                <div class="mt-2">
                    <img src="{{ $ad->image }}" alt="{{ $ad->title }}" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('admin.ads') }}" class="btn btn-secondary">إلغاء</a>
    </form>
@endsection