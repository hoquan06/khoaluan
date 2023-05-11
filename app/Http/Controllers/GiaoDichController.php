<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiaoDichController extends Controller
{
    public function index()
    {
        $donHang = Transaction::join('khach_hangs','khach_hangs.id','transactions.id_khach_hang')
                            ->select('transactions.*', 'khach_hangs.ho_va_ten',
                                    DB::raw("DATE_FORMAT(transactions.ngay_thanh_toan, '%d/%m/%Y - %H:%i') as ngay_thanh_toan")
                                )
                            ->get();

        return view('admin.pages.giao_dich.index', compact('donHang'));
    }
}
