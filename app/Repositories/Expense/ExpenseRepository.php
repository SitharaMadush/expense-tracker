<?php

namespace App\Repositories\Expense;

use App\Models\Expense;
use App\Repositories\Expense\ExpenseRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExpenseRepository implements ExpenseRepositoryInterface
{
    protected $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function getAllExpenses()
    {
        return $this->expense->all();
    }

    public function getExpenseById($id)
    {
        return $this->expense->findOrFail($id);
    }

    public function createExpense(array $data)
    {
        return $this->expense->create($data);
    }

    public function updateExpense($id, array $data)
    {
        $expense = $this->expense->findOrFail($id);
        $expense->update($data);
        return $expense;
    }

    public function deleteExpense($id)
    {
        $expense = $this->expense->findOrFail($id);
        return $expense->delete();
    }
}