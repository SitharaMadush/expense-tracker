<?php

namespace App\Services\Expense;

interface ExpenseServiceInterface
{
    public function getAllExpenses();
    public function getExpenseById($id);
    public function createExpense(array $data);
    public function updateExpense($id, array $data);
    public function deleteExpense($id);
}

