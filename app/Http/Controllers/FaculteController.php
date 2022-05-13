<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculte;
use Auth;
class FaculteController extends Controller
{
    //

    public function index(Request $request)
    {

        $Keyword =   $request->get('Keyword');
         
        $facs = Faculte::where('label','LIKE','%'.$Keyword.'%')->get();
        // $facs = Faculte::all();
        return view('admin.faculte.index')->with('facs', $facs);
    }

    public function create()
    {
        return view('admin.faculte.create');
    }
    public function store(Request $request)
    {
        $fac = new Faculte();
        $fac->label = $request->input('label');
        // $fac->user_id = Auth::user()->id;
        $fac->save();
        return redirect('admin/faculte');
    }
    public function edit($id)
    {
        try {
            $fac = Faculte::findOrFail($id);
            return view('admin.faculte.edit', ['fac' => $fac]);
        } catch (\Throwable $th) {
            return redirect('admin/faculte')->with('alert_err', 'Ops id not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $fac = Faculte::findOrFail($id);
            $fac->label = $request->input('label');
            $fac->save();
            return redirect('admin/faculte')->with('alert_scc', 'updated successfully');
        } catch (\Throwable $th) {
            return redirect('admin/faculte')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $fac = Faculte::find($id);
        $fac->delete();
        return redirect('admin/faculte');
    }
}