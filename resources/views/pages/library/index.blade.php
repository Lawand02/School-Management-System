@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.List_book') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.List_book') }}
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
                                <a href="{{route('library.create')}}" class="btn btn-primary btn-sm" role="button"
                                   aria-pressed="true">{{ trans('main_trans.new_book') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('main_trans.book') }}</th>
                                            <th>{{ trans('main_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('main_trans.Grade') }}</th>
                                            <th>{{ trans('main_trans.classrooms') }}</th>
                                            <th>{{ trans('main_trans.section') }}</th>
                                            <th>{{trans('main_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$book->title}}</td>
                                                <td>{{$book->teacher->Name}}</td>
                                                <td>{{$book->grade->Name}}</td>
                                                <td>{{$book->classroom->Name_Class}}</td>
                                                <td>{{$book->section->Name_Section}}</td>
                                                <td>
                                                    <a href="{{route('downloadAttachment',$book->file_name)}}" title="{{trans('main_trans.Download_book')}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i></a>
                                                    <a href="{{route('library.edit',$book->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $book->id }}" title="{{trans('main_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        @include('pages.library.destroy')
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