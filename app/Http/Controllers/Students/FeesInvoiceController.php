<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Fees_Invoice;
use App\Repository\FeesInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoiceController extends Controller
{
    protected $invoice;
    public function __construct(FeesInvoicesRepositoryInterface $invoice)
    {
        $this->invoice = $invoice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->invoice->index();
    }
    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->invoice->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fees_Invoice  $fees_Invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->invoice->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fees_Invoice  $fees_Invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->invoice->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fees_Invoice  $fees_Invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->invoice->destroy($request);
    }
    public function show($id)
    {
        return $this->invoice->show($id);
    }
}
