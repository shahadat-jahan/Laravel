@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center">
            <h2>Report</h2>
            <form class="form my-3" name="report" method="POST" action="{{ route('orders.showReport') }}">
                @csrf
                <div class="row">
                    <div class="col-1">
                        <label>From</label>
                    </div>
                    <div class="col-2">
                        <input class="form-control" type="date" name="from_date" value="{{ Request::get('f_date') }}">
                    </div>
                    <div class="col-1">
                        <label>To</label>
                    </div>
                    <div class="col-2">
                        <input class="form-control" type="date" name="to_date" value="{{ Request::get('t_date') }}">
                    </div>
                    <div class="col-2">
                        <select class="form-select" name="customer_id">
                            <option value="">Select customer</option>
                            
                            {{-- get customer --}}
                            @if ($customers) 
                                @foreach ($customers as $row) 
                                <option value="{{ $row->id }}" 
                                    {{ (Request::get('customer_id')==$row->id ) ? 'selected' : ''}}>
                                    {{ $row->fname.' '.$row->lname }}
                                </option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <button class="btn btn-outline-success mr-1" type="submit" name="search">
                            Generate report
                        </button>
                        <a href="{{ route('orders.report',['download'=>'pdf']) }}" class="btn btn-outline-success" type="button" name="search">
                            Generate PDF
                        </a>
                    </div>
                </div>
            </form>
            @include('orders.include.reportPDF')
            <!--display the link of the pages in URL-->
        </div>
    </div>
@endsection
