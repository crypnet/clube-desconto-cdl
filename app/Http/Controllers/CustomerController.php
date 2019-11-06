<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function __construct(
        CustomerRepository $customer_repository,
        Request $request
    ) {
        $this->customer_repository = $customer_repository;
        $this->request= $request;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer_repository->paginate(15);
        return view('panel.customer.index')->with(compact([
            'customers',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Customer $request)
    {
        $validated = $request->validated();
        $input['cnpj_cpf'] = preg_replace('/\D/', '', $request->input('cnpj_cpf'));
        $this->customer_repository->create($this->values($request));

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function values($request)
    {
        $values = [
            'fantasy_name' => $request->input('fantasy_name'),
            'cnpj'     => preg_replace('/\D/', '', $request->input('cnpj_cpf')),
            'reason_name'       => $request->input('reason'),
            'status'       => $request->input('status'),
        ];
        return $values;
    }
}
