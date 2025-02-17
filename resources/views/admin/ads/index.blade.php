@extends('admin.mainComponents')

@section('title', 'الاعلانات')

@section('link_one', 'الاعلانات')
@section('link_two', 'الاساسية')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header py-2 bg-success text-white d-flex align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-box" style="font-size: 25px;"></i>
                    <h4 class="my-0 flex-grow-1" style="font-size: 20px; font-weight: 400;">كل الاعلانات</h4>
                </div>
                <!-- Button trigger modal -->
                <div>
                    <a href="{{route('admin.ads.create')}}" type="button" class="btn btn-sm text-white" style="font-size: 15px; font-weight: 600; border-radius: 5px; border: 2px solid white;" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa-solid fa-plus mx-2"></i>
                        اضافة اعلان
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover text-center">
                    <thead class="bg-light">
                        <tr>
                            <th>رقم الاعلان</th>
                            <th>عنوان الاعلان</th>
                            <th>صورة الاعلان</th>
                            <th>اجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example product row, replace with dynamic content -->
                        @foreach ($ads as $ad)
                        <tr>
                            <td>{{ $ad->id }}</td>
                            <td>{{ $ad->title ?? '---' }}</td>
                            <td>
                                @if ($ad->image)
                                    <img src="{{ $ad->image }}" alt="image" width="80" height="60" style="object-fit:cover;border-radius:5px;">
                                @else
                                    ---
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.ads.edit', $ad->id) }}" class="btn btn-sm btn-outline-success mx-2 border-2" style="font-weight: 600 !important;">تعديل</a>
                                <form action="{{ route('admin.ads.destroy', $ad->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-2" style="font-weight: 600 !important;">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection