<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Http\Requests\Store\StoreExpense;
use App\Http\Requests\Update\UpdateExpense;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }

        /** @var User $user */
        $user = Auth::user();
        $expenses = $user->expenses()->orderByDesc('updated_at')->get();
//        $expenses = Auth::user()->expenses();

        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreExpense|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpense $request)
    {
        $this->authorize('create', Expense::class);

        /** @var User $user */
        $user = Auth::user();

        $expense = $user->expenses()->create(
            $request->only(['name', 'amount', 'description'])
        );

        return redirect(route('expenses.show', $expense->id));
    }

    /**
     * Display the specified resource.
     *
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Expense $expense)
    {
        $this->authorize('view', $expense);

        return view('expenses.view', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Expense $expense)
    {
        $this->authorize('update', $expense);

        return view('expenses.edit', ['expenses' => $expense]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateExpense|Request $request
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdateExpense $request, Expense $expense)
    {
        $this->authorize('update', $expense);

        $expense->update($request->only($expense->getFillable()));

        return redirect(route('expenses.show', $expense->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);

        $expense->delete();

        return redirect('expenses');
    }
}
