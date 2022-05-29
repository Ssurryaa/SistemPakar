<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\GejalaPenyakit;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gejala.gejala', [
            'gejalas' => Gejala::paginate(15),
            'gejala' => Gejala::all(),
            'penyakits' => Penyakit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required'
        ]);

        $gejala = new Gejala;
        $gejala->code = $request->code;
        $gejala->name = $request->name;
        $gejala->save();

        $gejala->penyakits()->attach($request->penyakit);

        return redirect('/gejala')->with('success', 'Data gejala telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Gejala::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit_gejala = Gejala::find($id);
        $edit_gejala->code = $request->code;
        $edit_gejala->name = $request->name;
        $edit_gejala->save();
        $edit_gejala->penyakits()->sync($request->penyakit);

        return redirect('/gejala')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyakit = GejalaPenyakit::where('gejala_id', $id)->get();
        if(is_null($penyakit)){
            Gejala::destroy($id);
            return redirect('/gejala')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect('/gejala')->with('error', 'Data tidak bisa dihapus karena berelasi dengan penyakit');
        }
    }
}
