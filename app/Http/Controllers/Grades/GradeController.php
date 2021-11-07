<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradesRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Grades.Grades', compact('Grades'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param GradesRequest $request
     * @return RedirectResponse
     */
    public function store(GradesRequest $request): RedirectResponse
    {

        try {

            $Grade = new Grade();

            $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->Notes = $request->Notes;
            $Grade->save();
            toastr()->success(trans('messages.success'), '', ['timeOut' => 2000]);
            return redirect()->route('Grades.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => trans('messages.error')]);
        }


//      return $request;


    }


    /**
     * Update the specified resource in storage.
     *
     * @param GradesRequest $request
     * @return RedirectResponse
     */
    public function update(GradesRequest $request): RedirectResponse
    {


        try {

            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Grades->Notes = $request->Notes,
            ]);
            toastr()->success(trans('messages.Update'), '', ['timeOut' => 2000]);
            return redirect()->route('Grades.index');
        } catch
        (Exception $e) {
            return redirect()->back()->withErrors(['error' => trans('messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {


        $MyClass_id = Classroom::where('Grade_id', $id)->pluck('Grade_id');

        if ($MyClass_id->count() === 0) {

            Grade::findOrFail($id)->delete();
            toastr()->error(trans('messages.Delete'), '', ['timeOut' => 2000]);
        } else {
            toastr()->error(trans('Grades_trans.delete_Grade_Error'), '', ['timeOut' => 2000]);
        }


        return redirect()->route('Grades.index');
    }

}

?>
