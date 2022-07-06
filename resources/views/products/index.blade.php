@extends('layouts.master')

@section('content')
    <div class="container-fluid content">

        @if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']) && $_POST['search'] == 'Go')
            @php $keyword = $_POST['keyword']; @endphp
        @else
            @php $keyword = ''; @endphp
        @endif

        <div class="container-fluid text-center">

            <h2>Products</h2>

            <div class="row">
                <form class="d-flex col-4" name="search" method="POST" action="{{ route('products.search', $keyword) }}">
                    @csrf
                    <input class="form-control" type="text" placeholder="Keyword..." name="keyword"
                        value="{{ Request::get('search') }}">
                    <button class="btn btn-outline-success" type="submit" value="Go" name="search">GO</button>
                </form>
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('products.create') }}">Add product</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-success table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!$products->isEmpty())
                            @php
                                $i = 0;
                                $page = 1;
                                $limit = session('paginateCount');
                                !empty($_GET['page']) ? ($page = $_GET['page']) : $page;
                                $i = ($page - 1) * $limit;
                            @endphp
                            @foreach ($products as $row)
                                @if ($row->status == 1)
                                    @php $status = 'Active'; @endphp
                                @else
                                    @php $status = 'Inactive'; @endphp
                                @endif
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('products.edit', $row->id) }}">
                                            {{ $row->name }}
                                        </a>
                                    </td>
                                    <td>{{ $row->code }}</td>
                                    <td>{{ $row->des }}</td>
                                    <td>{{ $status }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $row->id) }}">
                                            <i class="fa-solid fa-pen-to-square" style="color:green;"></i></a>

                                        <a onclick="return ConfirmDelete();"
                                            href="{{ route('products.destroy', $row->id) }}">
                                            <i class="fa-solid fa-trash" style="color:red;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No data found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!--display the link of the pages in URL-->
            <div class="row">
                <div class="d-flex col">`
                    {{ $products->links() }}
                </div>
                <div class="col-2">
                    <form class="d-flex" action="{{ route('products.limit') }}" method="POST">
                        @csrf
                        <select class="form-select" name="limit">
                            <option <?php
                            if (isset($limit) && $limit == 2) {
                                echo 'selected';
                            }
                            ?> value="2">2
                            </option>
                            <option <?php
                            if (isset($limit) && $limit == 5) {
                                echo 'selected';
                            }
                            ?> value="5">5</option>
                            <option <?php
                            if (isset($limit) && $limit == 10) {
                                echo 'selected';
                            }
                            ?> value="10">10</option>
                        </select>
                        <input class="btn-outline-primary" type="submit" name="submit" value="Set limit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
