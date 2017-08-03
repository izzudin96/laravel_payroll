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
        //Find user
        $user = User::findOrFail($request->user_id);

        //Validate Form
        $this->validate($request, [
            'user_id' => 'required|integer',
            'month' => 'required',
            'year' => 'required',
            'generalAllowance' => 'required|numeric',
            'overtime' => 'required|numeric',
            'claims' => 'required|numeric',
            'bonus' => 'required|numeric',
            'epfDeductionPercentage' => 'required|numeric',
            'zakat' => 'required|numeric'
        ]);


        // Calculate Total Additions
        $additions = $user->fixedSalary + $request->generalAllowance + $request->overtime + $request->claims + $request->bonus;

        // Calculate EPF Deduction based on Percentage
        $epfDeduction = ($additions * $request->epfDeductionPercentage) / 100;

        // Calculate Socso Deduction
        if($user->fixedSalary > 0 && $user->fixedSalary < 1001)
        {
            $socsoDeduction = 5.75;
            $companySocsoContribution = 20.15;
        }

        if($user->fixedSalary > 1000 && $user->fixedSalary < 2001)
        {
            $socsoDeduction = 10.25;
            $companySocsoContribution = 35.85;
        }

        if($user->fixedSalary > 2000 && $user->fixedSalary < 3001)
        {
            $socsoDeduction = 15.25;
            $companySocsoContribution = 55.35;
        }

        if($user->fixedSalary > 3000)
        {
            $socsoDeduction = 19.75;
            $companySocsoContribution = 69.05;
        }

        // Calculate Tax Deduction
        $annualSalary = $user->fixedSalary * 12;

        if($annualSalary > 0 && $annualSalary < 5001)
        {
            $taxDeduction = $user->fixedSalary * 0;
        }

        if($annualSalary > 5000 && $annualSalary < 20001)
        {
            $taxDeduction = $user->fixedSalary * 0.1;
        }

        if($annualSalary > 20000 && $annualSalary < 35001)
        {
            $taxDeduction = $user->fixedSalary * 0.5;
        }

        if($annualSalary > 35000 && $annualSalary < 50001)
        {
            $taxDeduction = $user->fixedSalary * 0.10;
        }

        if($annualSalary > 50000 && $annualSalary < 70001)
        {
            $taxDeduction = $user->fixedSalary * 0.16;
        }

        if($annualSalary > 70000 && $annualSalary < 100001)
        {
            $taxDeduction = $user->fixedSalary * 0.21;
        }

        if($annualSalary > 100000)
        {
            $taxDeduction = $user->fixedSalary * 0.24;
        }

        //Calculate Total Deduction
        $deduction = $epfDeduction + $socsoDeduction + $taxDeduction + $request->zakat;

        //Net Pay
        $netPay = $additions - $deduction;

        //Company EPF Contribution
        $companyEpfContribution = ($additions * ($request->epfDeductionPercentage + 2)) / 100;


        

        return redirect('/payslip');
    }
}
