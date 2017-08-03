<?php

namespace App\Http\Controllers;

use App\User;
use App\Payslip;
use Illuminate\Http\Request;

class PayslipsController extends Controller
{
    protected $guarded = [];

    public function index()
    {
        $payslips = Payslip::all();

        return  view('payslip.index', compact('payslips'));
    }

    public function create()
    {
        $users = User::all();

        return view('payslip.create', compact('users'));
    }

    public function store(Request $request)
    {
        Payslip::create($request->all());

        return redirect('/payslip');
    }
}
