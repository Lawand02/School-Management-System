<div class="modal fade" id="delete_exam{{$question->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('Questions.destroy','test')}}" method="post">
           {{method_field('delete')}}
           {{csrf_field()}}
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel">{{ trans('main_trans.delete_ques') }} </h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p> {{ trans('main_trans.warning_grade') }} {{$question->name}}</p>
                   <input type="hidden" name="id" value="{{$question->id}}">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                       <button type="submit" class="btn btn-danger">{{ trans('main_trans.submit') }}</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>