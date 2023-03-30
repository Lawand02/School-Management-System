@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('main_trans.student_Invoices') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.student_Invoices') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr class="alert-success">
                                        <th>#</th>
                                        <th>{{ trans('main_trans.name_name') }}</th>
                                        <th>{{ trans('main_trans.typefees') }}</th>
                                        <th>{{ trans('main_trans.amount_fees') }}</th>
                                        <th>{{ trans('main_trans.Grade') }}</th>
                                        <th>{{ trans('main_trans.classrooms') }}</th>
                                        <th>{{ trans('main_trans.invoice_state') }}</th>
                                        <th>{{ trans('Processes') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Fee_invoices as $Fee_invoice)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$Fee_invoice->student->name}}</td>
                                        <td>{{$Fee_invoice->fees->title}}</td>
                                        <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                        <td>{{$Fee_invoice->grade->Name}}</td>
                                        <td>{{$Fee_invoice->classroom->Name_Class}}</td>
                                        <td>{{$Fee_invoice->description}}</td>
                                        <td>
                                            <a href="{{route('sons.receipt',$Fee_invoice->student_id)}}" title="المدفوعات" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection

