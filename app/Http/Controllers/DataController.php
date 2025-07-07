<?php

namespace App\Http\Controllers;

use App\Http\Modules\MData;
use Illuminate\Http\Request;
use App\Http\Requests\DataRequest;

class DataController extends Controller
{
    public function index()
    {
        $modul = new MData;
        $data = $modul->getAllData();

        return view('data.view', compact('data'));
    }

    public function page_add()
    {
        $modul = new MData;
        $id = $modul->generateUniqueId();

        return view('data.add', compact('id'));
    }

    public function create(DataRequest $request)
    {
        $modul = new MData;
        $modul->id = $request->id;
        $modul->pic = $request->pic;
        $modul->perusahaan = $request->perusahaan;
        
        $insert = $modul->insertData();

        if ($insert) {
            return redirect('/')->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect('/')->with('error', 'Data gagal disimpan.');
        }
    }

    public function page_edit(Request $request)
    {
        $id = $request->query('id');
        $modul = new MData();

        $data = $modul->getDataById($id);

        if (!$data) {
            return redirect('/')->with('error', 'Data tidak ditemukan.');
        } 

        return view('data.edit', compact('data'));
    }

    public function update(DataRequest $request)
    {
        $modul = new MData;
        $modul->id = $request->id;
        $modul->pic = $request->pic;
        $modul->perusahaan = $request->perusahaan;
        
        $update = $modul->updateData();

        if ($update) {
            return redirect('/')->with('success', 'Data berhasil diupdate.');
        } else {
            return redirect('/')->with('error', 'Data gagal diupdate.');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $modul = new MData();
        $deleted = $modul->deleteData($id);

        if ($deleted) {
            return redirect('/')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('/')->with('error', 'Data gagal dihapus.');
        }
    }
}
