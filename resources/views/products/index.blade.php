@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product List</h1>

        <div class="form-group">
            <input type="text" class="form-control" id="search" placeholder="Search by name...">
        </div>

        <table class="table table-bordered" id="products-table">
            <thead>
                <tr>
                    <th><a href="#" class="sort-link" data-sort="name">Name</a></th>
                    <th><a href="#" class="sort-link" data-sort="price">Price</a></th>
                    <th><a href="#" class="sort-link" data-sort="stock">Stock</a></th>
                </tr>
            </thead>
            <tbody>
                <!-- Datos cargados via AJAX -->
            </tbody>
        </table>

        <div id="pagination-links"></div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/products.js') }}"></script>
@endsection
