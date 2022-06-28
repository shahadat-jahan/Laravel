@extends('layouts.master')

@section('content')

    <div class="container-fluid content">
        <div class="container-fluid text-center">

            <h2>Divisions</h2>
            
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="{{ route('divisions.create') }}">Add Division</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-success table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($divisions)
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($divisions as $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <a onclick="return ConfirmDelete();" href="{{ route('divisions.destroy', $row->id) }}">
                                            <i class="fa-solid fa-trash" style="color:red;"></i>
                                        </a>
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

        </div>
    </div>

@endsection
