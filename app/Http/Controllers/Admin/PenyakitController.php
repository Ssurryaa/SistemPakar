<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\GejalaPenyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penyakit.penyakit')
            ->with('penyakits', Penyakit::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penyakit.create');
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
            'code' => 'required|max:255',
            'name' => 'required|max:255',
            'definisi' => 'required',
            'penyebab' => 'required',
            'solusi' => 'required'
        ]);

        $post = Penyakit::create([
            'code' => $request->code,
            'name' => $request->name,
            'definisi' => $request->definisi,
            'penyebab' => $request->penyebab,
            'solusi' => $request->solusi
        ]);

        return redirect('/penyakit')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.penyakit.detail')
            ->with('penyakit', Penyakit::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.penyakit.edit')
            ->with('penyakit', Penyakit::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit_penyakit = Penyakit::find($id);
        $edit_penyakit->code = $request->code;
        $edit_penyakit->name = $request->name;
        $edit_penyakit->definisi = $request->definisi;
        $edit_penyakit->penyebab = $request->penyebab;
        $edit_penyakit->solusi = $request->solusi;
        $edit_penyakit->save();
        
        return redirect('/penyakit')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyakit = GejalaPenyakit::where('penyakit_id', $id)->get();
        if(is_null($penyakit)){
            Penyakit::destroy($id);
            return redirect('/penyakit')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect('/penyakit')->with('error', 'Data tidak bisa dihapus karena beralasi dengan gejala');
        }
    }
}
