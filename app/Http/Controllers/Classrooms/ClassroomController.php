<?php


namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;


class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.My_Classes.My_Classes', compact('My_Classes', 'Grades'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ClassroomRequest $request
     * @return RedirectResponse
     */
    public function store(ClassroomRequest $request): RedirectResponse
    {


        $List_Classes = $request->List_Classes;


        try {

            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();

                $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name_class_ar']];

                $My_Classes->Grade_id = $List_Class['Grade_Id'];

                $My_Classes->save();

            }


            toastr()->success(trans('messages.success'), '', ['timeOut' => 2000]);
            return redirect()->route('Classrooms.index');


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param ClassroomRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ClassroomRequest $request, int $id): RedirectResponse
    {

        try {

            $Classroom = Classroom::findOrFail($id);

            $Classroom->update([
                $Classroom->Name_Class = ['ar' => $request->Name_class_ar, 'en' => $request->Name_class_en],
                $Classroom->Grade_id = $request->Grade_Id,
            ]);
            toastr()->success(trans('messages.Update'), '', ['timeOut' => 2000]);
            return redirect()->route('Classrooms.index');
        } catch
        (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {

        Classroom::findOrFail($id)->delete();
        toastr()->error(trans('messages.Delete'), '', ['timeOut' => 2000]);
        return redirect()->route('Classrooms.index');
    }


    public function delete_all(Request $request): RedirectResponse
    {


        $ids = explode(",", $request['arrayOfClasses']);

        Classroom::destroy($ids);


        toastr()->error(trans('messages.Delete'), '', ['timeOut' => 2000]);
        return redirect()->route('Classrooms.index');
    }

    public function Filter_Classes(Request $request)
    {

        $Grades = Grade::all();

        $My_Classes  = Grade::findOrFail($request['Grade_id'])->classrooms;

        return view('pages.My_Classes.My_Classes', compact('My_Classes' , 'Grades'));

    }

}

?>
