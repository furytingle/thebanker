<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;

class TransactionController extends Controller
{
    const DEFAULT_FILTER = 'id';

    const DEFAULT_PAGINATE = 10;

    const DEFAULT_LIMIT = 100;
    
    const DEFAULT_OFFSET = 0;

    public function getTransactions(Request $request) {

        $filter = $request->has('filter') ? $request->filter : self::DEFAULT_FILTER;

        $transactions = Transaction::orderBy($filter)->paginate(self::DEFAULT_PAGINATE);

        $transactions->setPath('?filter=' . $filter);

        return view('transaction.index', [
           'transactions' => $transactions
        ]);
    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : self::DEFAULT_LIMIT;
        $offset = $request->has('offset') ? $request->offset : self::DEFAULT_OFFSET;

        if ($request->has('customerId')) {
            $transactions = Transaction::where(['customerId' => $request->customerId])
                ->limit($limit)
                ->offset($offset)
                ->get();
        } else {
            $transactions = Transaction::limit($limit)
                ->offset($offset)
                ->get();
        }

        return $transactions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customerId' => 'required|numeric|exists:customers,id',
            'amount' => 'required|numeric'
        ]);

        return Transaction::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            return $transaction;
        } else {
            return [
                'status' => 'error',
                'message' => 'Wrong transaction id'
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required|numeric'
        ]);

        $transaction = Transaction::find($id);

        if ($transaction) {
            $transaction->fill($request->all())->save();

            return $transaction;
        } else {
            return [
                'status' => 'error',
                'message' => 'Wrong transaction id'
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            if ($transaction->delete()) {
                return [
                    'status' => 'success',
                    'id' => $transaction->id
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Error deleting transaction'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Wrong transaction id'
            ];
        }
    }
}
