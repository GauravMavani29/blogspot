<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plan;
class PlanController extends Controller
{
    //
    public function index()
    {
        $plans = Plan::all();
        return view('frontend.plans.index', compact('plans'));
    }
    public function adminindex()
    {
        $plans = Plan::all();
        return view('backend.plans.index', compact('plans'));
    }
    /**
     * Show the Plan.
     *
     * @return mixed
     */
    public function show(Plan $plan, Request $request)
    {   
        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();
        
        return view('frontend.plans.show', compact('plan', 'intent'));
    }
}
