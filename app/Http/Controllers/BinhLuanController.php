<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BinhLuanController extends Controller
{

    public function index()
    {
        $tintucs = DB::table("binh_luans")
            ->latest('id')
            ->simplePaginate(6);
        return view("admin.binhluan.index", compact("tintucs"));
    }

    public function store(Request $request)
    {
        DB::table('binh_luans')->insert([
            'tin_tuc_id' => $request->input('tin_tuc_id'),
            'ten_nguoi_dung' => $request->input('ten_nguoi_dung'),
            'binh_luan' => $request->input('binh_luan'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi.');
    }
}
