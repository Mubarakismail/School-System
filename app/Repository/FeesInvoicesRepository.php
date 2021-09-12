<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Fees_Invoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeesInvoicesRepository implements FeesInvoicesRepositoryInterface
{
    public function index()
    {
        $Fee_invoices = Fees_Invoice::all();
        $Grades = Grade::all();
        return view('pages.Fees_Invoices.index', compact('Fee_invoices', 'Grades'));
    }
    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('Classroom_id', $student->Classroom_id)->get();
        return view('pages.Fees_Invoices.add', compact('student', 'fees'));
    }
    public function edit($id)
    {
        $fee_invoices = Fees_Invoice::findOrFail($id);
        $fees = Fee::where('Classroom_id', $fee_invoices->Classroom_id)->get();
        return view('pages.Fees_Invoices.edit', compact('fee_invoices', 'fees'));
    }
    public function destroy($request)
    {
        Fees_Invoice::findOrFail($request->id)->delete();
        toastr()->error('Invoice Deleted Successfully');
        return redirect()->route('Fees_Invoices.index');
    }
    public function store($request)
    {
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();

        try {

            foreach ($List_Fees as $List_Fee) {
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fees = new Fees_Invoice();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->Grade_id = $request->Grade_id;
                $Fees->Classroom_id = $request->Classroom_id;;
                $Fees->fee_id = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();

                // حفظ البيانات في جدول حسابات الطلاب
                $StudentAccount = new StudentAccount();
                $StudentAccount->student_id = $List_Fee['student_id'];
                $StudentAccount->Grade_id = $request->Grade_id;
                $StudentAccount->Classroom_id = $request->Classroom_id;
                $StudentAccount->Debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
            }

            DB::commit();

            toastr()->success('Data Saved Successfully');
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {
        DB::beginTransaction();
        try {
            $fees = Fees_Invoice::findeOrFail($request->id);
            $fees->Fee_id = $request->Fee_id;
            $fees->amount = $request->amount;
            $fees->description = $request->description;
            $fees->save();

            $stdntAccount = StudentAccount::where('fee_invoice_id', $request->id)->first();
            $stdntAccount->Debit = $request->amount;
            $stdntAccount->Credit = 0.0;
            $stdntAccount->description = $request->description;
            $stdntAccount->save();
            DB::commit();

            toastr()->success('Data Updated Successfully');
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
