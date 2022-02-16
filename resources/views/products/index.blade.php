@extends('layouts.master')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Add Product
                            </a><br><br>

                            <h5 class="card-title">Product List</h5><br>

                            <table id="category" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th class="text-center">Image</th>
                                        <th>Name</th>
                                        <th>SKU</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products)
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td class="text-center">
                                                    <img width="70px" height="74px" src="{{ asset('images/product_images/'. $product->image) }}" alt="">
                                                </td>
                                                <td>{{ $product->name ?? '' }}</td>
                                                <td>{{ $product->sku ?? '' }}</td>
                                                <td>{{ $product->category->name ?? '' }}</td>
                                                <td>{{ $product->brand->name ?? '' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('products.show', $product->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="fa fa-desktop"></i> Show</a>

                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>

                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                        data-form-id="product-delete-{{ $product->id }}"><i
                                                            class="fa fa-trash"></i> Delete</a>

                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        id="product-delete-{{ $product->id }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#category").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#category_wrapper .col-md-6:eq(0)');
        });

    </script>
@endpush
