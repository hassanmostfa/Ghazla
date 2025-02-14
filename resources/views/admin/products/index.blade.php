@extends('admin.mainComponents')

@section('title', 'المنتجات')

@section('link_one', 'المنتجات')
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
                    <h4 class="my-0 flex-grow-1" style="font-size: 20px; font-weight: 400;">كل المنتجات</h4>
                </div>
                <!-- Button trigger modal -->
                <div>
                    <a href="{{route('admin.products.create')}}" type="button" class="btn btn-sm text-white" style="font-size: 15px; font-weight: 600; border-radius: 5px; border: 2px solid white;" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa-solid fa-plus mx-2"></i>
                        اضافة منتج
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover text-center">
                    <thead class="bg-light">
                        <tr>
                            <th>رقم المنتج</th>
                            <th>عنوان المنتج</th>
                            <th>الوصف</th>
                            <th>السعر</th>
                            <th>اجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example product row, replace with dynamic content -->
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-success mx-2 border-2" style="font-weight: 600 !important;">تعديل</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
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

<!-- Modal For Add Product -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-0 text-center bg-success text-white">
                <h5 class="modal-title text-center p-2 m-0 w-100" style="font-size: 20px; font-weight: 400;" id="exampleModalLongTitle">اضافة منتج جديد</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <!-- Product Title -->
                    <div class="mb-3">
                        <label for="product_title" style="font-weight: 600; font-size: 18px" class="form-label">عنوان المنتج</label>
                        <input type="text" class="form-control" id="product_title" name="title" placeholder="مثال: منتج جديد" required>
                    </div>

                    <!-- Product Description -->
                    <div class="mb-3">
                        <label for="product_description" style="font-weight: 600; font-size: 18px" class="form-label">الوصف</label>
                        <textarea class="form-control" id="product_description" name="description" rows="3" placeholder="ادخل وصف المنتج" required></textarea>
                    </div>

                    <!-- Product Price -->
                    <div class="mb-3">
                        <label for="product_price" style="font-weight: 600; font-size: 18px" class="form-label">السعر</label>
                        <input type="number" class="form-control" id="product_price" name="price" placeholder="ادخل سعر المنتج" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-outline-success">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endSection
