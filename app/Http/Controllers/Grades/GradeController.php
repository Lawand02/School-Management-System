<?php

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;


use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades = Grade::all();
    return view('pages.grades.Grades',compact('Grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrades $request)
  {

    // if(Grade::where('Name->ar',$request->Name)->orWhere('Name->en',$request->Name_en)->exists())
    // {
    //   return redirect()->back()->withErrors(trans('main_trans.Exists'));
    // }



    try {
      $validated = $request->validated();
      $Grade = new Grade();
      $Grade->name=['en'=>$request->Name_en, 'ar'=>$request->Name];
       /* two way :
           $translations = [
               'en' => $request->Name_en,
               'ar' => $request->Name
           ];
           $Grade->setTranslations('Name', $translations);
           */
      $Grade->notes=$request->Notes;
      $Grade->save();
         toastr()->success(trans('main_trans.success'));
      return redirect()->route('grade.index');
    }
      catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
   }





  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreGrades $request)
  {
    try {
      $validated = $request->validated();
      $Grades = Grade::findOrFail($request->id);
      $Grades->update([
        $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
        $Grades->Notes = $request->Notes,
      ]);
      toastr()->success(trans('main_trans.Update'));
      return redirect()->route('grade.index');
  }
  catch
  (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      // In order to check if classroom related to grades exist
      $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

      if($MyClass_id->count() == 0){


    $Grades = Grade::findOrFail($request->id)->delete();
    toastr()->error(trans('main_trans.Delete'));
    return redirect()->route('grade.index');
  }
      else{

          toastr()->error(trans('main_trans.delete_Grade_Error'));
          return redirect()->route('grade.index');

      }
}}

?>
