<?php

namespace App\Http\Controllers\API;
use App\Models\Payments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Payments $payments)
    {
        return $payments;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payments = Payments::Cretae([
            ...$request->validate([
                'transaction_id'=> 'required',
                'status'=> 'Pending',
            ])
        ]);
        return $payments;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
