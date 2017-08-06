<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Payslip;
use Illuminate\Http\Request;

class PayslipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager')->only('all', 'create', 'store', 'destroy');
    }

    public function index()
    {
        $payslips = Payslip::where('user_id', Auth::user()->id)->get();

        return  view('payslip.index', compact('payslips'));
    }

    public function all()
    {
        $payslips = Payslip::latest()->get();

        return  view('payslip.index', compact('payslips'));
    }

    public function create()
    {
        $users = User::all();

        return view('payslip.create', compact('users'));
    }

    public function store(Request $request)
    {
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

        //Find user
        $user = User::findOrFail($request->user_id);

        // Calculate Total Additions
        $salaryAndAllowance = $user->fixedSalary + $request->generalAllowance;
        $additions = $salaryAndAllowance + $request->overtime + $request->claims + $request->bonus;

        // Calculate EPF Deduction based on Percentage
        $epfDeduction = ($salaryAndAllowance * $request->epfDeductionPercentage) / 100;

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
        $deductions = $epfDeduction + $socsoDeduction + $taxDeduction + $request->zakat;

        //Net Pay
        $netPay = $additions - $deductions;

        //Company EPF Contribution
        $companyEpfContribution = ($salaryAndAllowance * ($request->epfDeductionPercentage + 2)) / 100;

        $payslip = Payslip::create([
            'user_id' => $request->user_id,
            'month' => $request->month,
            'year' => $request->year,

            //allowance
            'generalAllowance' => $request->generalAllowance,
            'overtime' => $request->overtime,
            'claims' => $request->claims,
            'bonus' => $request->bonus,

            //total Additions
            'totalAdditions' => $additions,

            //deduction
            'epfDeductionPercentage' => $request->epfDeductionPercentage,
            'epfDeduction' => $epfDeduction,
            'socsoDeduction' => $socsoDeduction,
            'taxDeduction' => $taxDeduction,
            'zakat' => $request->zakat,

            //total Deduction
            'totalDeductions' => $deductions,

            //company contribution
            'companyEpfContribution' => $companyEpfContribution,
            'companySocsoContribution' => $companySocsoContribution,

            //summary
            'netPay' => $netPay,

            //status
            'isVerified' => 0,
        ]);

        return redirect("/payslip/$payslip->id");
    }

    public function show(Payslip $payslip)
    {
        return view('payslip.show', compact('payslip'));
    }

    public function destroy(Payslip $payslip)
    {
        $payslip->delete();

        return redirect('payslip');
    }
}
