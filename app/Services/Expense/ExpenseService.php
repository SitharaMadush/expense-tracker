<?php

namespace App\Services\Expense;

use App\Repositories\Expense\ExpenseRepositoryInterface;

class ExpenseService implements ExpenseServiceInterface
{
    protected $expenseRepository;

    public function __construct(ExpenseRepositoryInterface $expenseRepository)
    {
        return $this->expenseRepository = $expenseRepository;
    }

    public function getAllExpenses()
    {
        return $this->expenseRepository->getAllExpenses();
    }

    public function getExpenseById($id)
    {
        return $this->expenseRepository->getExpenseById($id);
    }

    public function createExpense(array $data)
    {
        return $this->expenseRepository->createExpense($data);
    }

    public function updateExpense($id, array $data)
    {
        return $this->expenseRepository->updateExpense($id, $data);
    }

    public function deleteExpense($id)
    {
        return $this->expenseRepository->deleteExpense($id);
    }

}

