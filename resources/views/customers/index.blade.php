@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        @if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']) && $_POST['search'] == 'Go')
            @php $keyword = $_POST['keyword']; @endphp
        @else
            @php $keyword = ''; @endphp
        @endif
        <div class="container-fluid text-center">
            <h2>Customers</h2>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <form class="d-flex col-4" name="search" method="POST" action="{{ route('customers.search', $keyword) }}">
                    @csrf
                    <input class="form-control" type="text" placeholder="Keyword..." name="keyword"
                        value="{{ Request::get('search') }}">
                    <button class="btn btn-outline-success" type="submit" value="Go" name="search">GO</button>
                </form>
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('customers.create') }}">Add customer</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-success table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$customers->isEmpty())
                            @php
                                $i = 0;
                                $page = 1;
                                $limit = session('paginateCount');
                                !empty($_GET['page']) ? ($page = $_GET['page']) : $page;
                                $i = ($page - 1) * $limit;
                            @endphp
                            @foreach ($customers as $row)
                                @if ($row->status == 1)
                                    @php $status = 'Active'; @endphp
                                @else
                                    @php $status = 'Inactive'; @endphp
                                @endif
                                @if (!empty($row->image))
                                    @php $image = $row->image; @endphp
                                @else
                                    @php $image ='unknown.jpg'; @endphp
                                @endif
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <div class="user-panel d-flex">
                                            <div class="image">
                                                <img src="{{ asset('public/images/' . $image) }}"
                                                    class="img-circle elevation-2" alt="Customer Image">
                                            </div>
                                            <div class="info">
                                                <a class="text-decoration-none text-dark"
                                                    href="{{ route('customers.edit', $row->id) }}">{{ $row->fname . ' ' . $row->lname }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $row->username }}</td>
                                    <td id='changeStatus{{ $row->id }}'>
                                        {{ $row->status == '1' ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <button id='changeStatusBtn{{ $row->id }}'
                                            class="status btn btn-sm btn-warning" data-status="{{ $row->status }}"
                                            data-id="{{ $row->id }}">
                                            {{ $row->status == '1' ? 'Inactive' : 'Active' }}
                                        </button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="save-data btn btn-sm " data-bs-toggle="modal"
                                            data-bs-target="#myModal" data-id={{ $row->id }}>
                                            <i class="fa-solid fa-address-card"></i>
                                        </button>

                                        <a href="{{ route('customers.edit', $row->id) }}">
                                            <i class="fa-solid fa-pen-to-square" style="color:green;"></i></a>

                                        <a onclick="return ConfirmDelete();"
                                            href="{{ route('customers.destroy', $row->id) }}">
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
                    {{ $customers->links() }}
                </div>
                <div class="col-2">
                    <form class="d-flex" action="{{ route('customers.limit') }}" method="POST">
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
    <!-- The Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Customer detail</h4>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal"></button>-->
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p id="modalBody"></p>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.status', function() {
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                window.alert("Do you want change status!");
                $.ajax({
                    url: "{{ URL::to('customers/chng-status') }}",
                    type: "POST",
                    data: {
                        "id": id,
                        "status": status
                    },
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (status == 1) {
                            console.log('Active');
                            $('#changeStatus' + id).text("Inactive");
                            $('#changeStatusBtn' + id).addClass('btn btn-sm btn-warning');
                            $('#changeStatusBtn' + id).text('Active');
                            $('#changeStatusBtn' + id).data('status', 0);
                        }
                        if (status == 0) {
                            console.log('Inactive');
                            $('#changeStatus' + id).text("Active");
                            $('#changeStatusBtn' + id).addClass('btn btn-sm btn-warning');
                            $('#changeStatusBtn' + id).text('Inactive');
                            $('#changeStatusBtn' + id).data('status', 1);
                        }
                    }

                });
            });
            $(document).on('click', '.save-data', function() {
                var id = $(this).attr('data-id');
                //   window.alert(id);    
                $.ajax({
                    url: "{{ url('/customers/modal') }}",
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id
                    },
                    success: function(res) {
                        $('#modalBody').html(res.html);
                    }
                });
            });
        });
    </script>
@endsection
