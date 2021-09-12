<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ReceiptStudent;
use App\Repository\ReceiptStudentRepository;
use App\Repository\ReceiptStudentRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $receipt;
    public function __construct(ReceiptStudentRepositoryInterface $receipt)
    {
        $this->receipt = $receipt;
    }
    public function index()
    {
        return $this->receipt->index();
    }
    public function store(Request $request)
    {
        return $this->receipt->store($request);
    }
    public function show($id)
    {
        return $this->receipt->show($id);
    }
    public function edit($id)
    {
        return $this->receipt->edit($id);
    }
    public function update(Request $request)
    {
        return $this->receipt->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->receipt->destroy($request);
    }
}
