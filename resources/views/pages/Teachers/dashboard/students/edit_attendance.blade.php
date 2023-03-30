<!-- Deleted inFormation Student -->
<div class="modal fade" id="edit_attendance{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.edit_Attendance') }} : {{$student->name}}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('attendance.edit','test')}}" method="post">
                   @csrf
                   <input type="hidden" name="id" value="{{$student->id}}">
                   <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                       <input name="attendences"
                              {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                              class="leading-tight" type="radio" value="presence">
                       <span class="text-success">{{ trans('main_trans.at_Presence') }}</span>
                   </label>

                   <label class="ml-4 block text-gray-500 font-semibold">
                       <input name="attendences"
                              {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                              class="leading-tight" type="radio" value="absent">
                       <span class="text-danger">{{ trans('main_trans.at_Absence') }}</span>
                   </label>
                   <div class="modal-footer">
                  
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                       <button class="btn btn-danger">{{trans('main_trans.submit')}}</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>