<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Services\Expense\ExpenseServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(ExpenseServiceInterface $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    public function index()
    {
        $expenses = $this->expenseService->getAllExpenses();
        return response()->json($expenses);
    }

    public function show($id)
    {
        $expense = $this->expenseService->getExpenseById($id);
        return response()->json($expense);
    }

    public function store(StoreExpenseRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['created_by'] = Auth::id();

        $expense = $this->expenseService->createExpense($validatedData);
        return response()->json(['message' => 'Expense saved successfully.', 'data' => $expense], 201);
    }

    public function update(UpdateExpenseRequest $request, $id)
    {
        $validatedData = $request->validated();

        $expense = $this->expenseService->updateExpense($id, $validatedData);
        return response()->json(['message' => 'Expense updated successfully.', 'data' => $expense], 200);

    }

    public function destroy($id)
    {
        try{
            $this->expenseService->deleteExpense($id);
            return response()->json(['message' => 'Successfully deleted the Expense.'], 200);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json(['message' => 'Error deleting the Expense'], 409);
        }
    }
}