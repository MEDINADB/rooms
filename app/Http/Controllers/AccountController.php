<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;
use Illuminate\Notifications\Action;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
     
        
         return view('accounts.index');
       
    }
    public function create()
    {
        return view('accounts.create');
    }


    public function store(Request $request)
    {
        $accounts = new Account();
        $accounts ->platform = request('platform');
        $accounts ->host = request('host');
        $accounts ->project = request('project');
        $accounts->save();

        return redirect('/accounts')->with('success','La cuenta fue registrada correctamente');;

    }
    public function show($id)
    {
        $account = Account::find($id);

        return view('accounts.show' , compact('account'));
    }
    public function edit($id)
    {
        $account = Account::find($id);
        return view('accounts.edit' , compact('account'));
    }

   
    public function update(Request $request, $id)
    {
    
        $accounts =  Account::findOrFail($id);

        $accounts ->platform = $request-> get('platform');
        $accounts ->host = $request-> get('host');
        $accounts ->project = request('project');
        $accounts->save();

        return redirect('/accounts')->with('success','La cuenta fue actualizada correctamente');

    }
    public function destroy($id)
    {
       $account= Account::FindOrFail($id);
       $account -> delete();
       return redirect('/accounts')->with('success','La cuenta fue Eliminada.');
    }
}
