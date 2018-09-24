<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
    	$config = Config::first();
    	return view('settings.index', compact('config'));
    }

    public function update(Request $request)
    {
    	$config = Config::first();
    	$config->payment_amount = $request->payment_amount;
    	$config->currency = $request->currency;
    	$config->save();

    	flash('Settings updated')->success();
    	
    	return back();
    }
}
