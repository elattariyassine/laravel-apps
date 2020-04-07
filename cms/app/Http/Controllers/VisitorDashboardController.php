<?php

namespace App\Http\Controllers;

use App\VisitorDashboard;
use Illuminate\Http\Request;

class VisitorDashboardController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VisitorDashboard  $visitorDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $VD = VisitorDashboard::find(1);
        return view('visitorDashboard.editDashboard', ['vd' => $VD]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisitorDashboard  $visitorDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $VD = VisitorDashboard::find(1);
        $VD->update($request->all());
        session()->flash('success', 'Data updated successfuly');
        return view('visitorDashboard.editDashboard', ['vd' => $VD]);
    }

}
