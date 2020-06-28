<?php

namespace App\Http\Controllers\Domicilary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\Domicilary\AddressFormRequest;

use App\Address;
use Session;
use Auth;

class AddressController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $addresses = Address::whereUserId($userId)
            ->orderBy('career')
            ->orderBy('street')
            ->get();
        return view('domicilary.addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('domicilary.addresses.create');
    }

    public function store(AddressFormRequest $request)
    {
        Address::create($request->all());

        $message = ['type' => 'success', 'text' => 'Dirección agregada correctamente'];
        Session::flash('message', $message);

        return redirect()->back();
    }

    public function show(Address $address)
    {

    }

    public function edit(Address $address)
    {
        return view('domicilary.addresses.edit', compact('address'));
    }

    public function update(AddressFormRequest $request, Address $address)
    {
        $address->update($request->all());

        $message = ['type' => 'success', 'text' => 'Dirección actualizada correctamente'];
        Session::flash('message', $message);

        return redirect()->back();
    }

    public function destroy(Address $address)
    {
        $address->delete();
        $message = ['type' => 'success', 'text' => 'Dirección eliminada correctamante'];
        Session::flash('message', $message);

        return redirect()->back();
    }
}
