@extends('layouts.master')
@section('css')
 @toastr_css
@section('title')
    Grades
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('main_trans.Grades')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                {{ trans('main_trans.add_grade') }}
            </button>
            <br><br>
          <div class="table-responsive">
          <table id="datatable" class="table  table-hover table-sm table-bordered p-0">
            <thead>
                <tr class="alert-primary">
                    <th>#</th>
                    <th>{{trans('main_trans.Name')}}</th>
                    <th>{{trans('main_trans.Notes')}}</th>
                    <th>{{trans('main_trans.Processes')}}</th>

                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach ($Grades as $Grade)
                <?php $i++; ?>

                <tr>
                    <td>{{$i}}</td>
                    <td>{{$Grade->name}}</td>
                    <td>{{$Grade->notes}}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#edit{{ $Grade->id }}"
                        title="{{ trans('main_trans.Edit') }}"><i
                        class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#delete{{ $Grade->id }}"
                        title="{{ trans('main_trans.Delete') }}"><i
                        class="fa fa-trash"></i></button>
                    </td>

                </tr>
              <!-- edit_modal_Grade -->
              <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('main_trans.edit_grade') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <!-- add_form -->
                           <form action="{{route('grade.update','test')}}" method="post">
                               {{method_field('patch')}}
                               @csrf
                               <div class="row">
                                   <div class="col">
                                       <label for="Name"
                                              class="mr-sm-2">{{ trans('main_trans.stage_name_ar') }}
                                           :</label>
                                       <input id="Name" type="text" name="Name"
                                              class="form-control"
                                              value="{{$Grade->getTranslation('name', 'ar')}}"
                                              required>
                                       <input id="id" type="hidden" name="id" class="form-control"
                                              value="{{ $Grade->id }}">
                                   </div>
                                   <div class="col">
                                       <label for="Name_en"
                                              class="mr-sm-2">{{ trans('main_trans.stage_name_en') }}
                                           :</label>
                                       <input type="text" class="form-control"
                                              value="{{$Grade->getTranslation('name', 'en')}}"
                                              name="Name_en" required>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label
                                       for="exampleFormControlTextarea1">{{ trans('main_trans.Notes') }}
                                       :</label>
                                   <textarea class="form-control" name="Notes"
                                             id="exampleFormControlTextarea1"
                                             rows="3">{{ $Grade->notes }}</textarea>
                               </div>
                                              <br><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
            <button type="submit" class="btn btn-success">{{ trans('main_trans.submit') }}</button>
        </div>
        </form>
    </div>
</div>
</div>
 <!-- delete_modal_Grade -->
 <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('main_trans.delete_grade') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('grade.destroy','test')}}" method="post">
                   {{method_field('Delete')}}
                   @csrf
                   {{ trans('main_trans.warning_grade') }}
                   <input id="id" type="hidden" name="id" class="form-control"
                          value="{{ $Grade->id }}">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                       <button type="submit"
                               class="btn btn-danger">{{ trans('main_trans.submit') }}</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>
                @endforeach
            </tbody>


         </table>
        </div>
        </div>
      </div>
    </div>
    <!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.add_grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                 <form action="{{ route('grade.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('main_trans.stage_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('main_trans.stage_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('main_trans.Notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3" ></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('main_trans.submit') }}</button>
            </div>
            </form>

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
