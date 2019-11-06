<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer;
use App\Http\Requests\CustomerEdit;
use App\Repositories\CustomerRepository;
use Http\Discovery\Exception\NotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function __construct(
        CustomerRepository $customer_repository,
        Request $request
    ) {
        $this->customer_repository = $customer_repository;
        $this->request= $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
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
        $this->middleware('auth');
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
        $this->middleware('auth');
        $validated = $request->validated();
        $input['cnpj'] = preg_replace('/\D/', '', $request->input('cnpj'));
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
        $this->middleware('auth');
        try {
            $user = $this->customer_repository->where('id', $id)->first();
        } catch (ModelNotFoundException $e) {
            flash(trans('panel.text.not_found_f', ['value' => trans('panel.text.permission')]))->error()->important();
            return redirect()->route('customer.index');
        }
        return view('panel.customer.edit')->with(compact([
            'user',
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerEdit $request, $id)
    {
        $this->middleware('auth');
        $validated = $request->validated();
       $this->customer_repository->updateById($id,$this->values($request));
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('auth');
        $this->customer_repository->deleteById($id);
        return redirect()->route('customer.index');
    }

    public function valid(Request $request){
        $customer= "null";
        $cnpj=preg_replace('/\D/', '', $request->input('cnpj'));
        try{
            $customer= $this->customer_repository->where('cnpj',$cnpj)->where('status',1)->first();
        }catch (ModelNotFoundException $e){
            $customer= "null";
        }
        return $customer;
    }


    private function values($request)
    {
        $this->middleware('auth');
        $values = [
            'fantasy_name' => $request->input('fantasy_name'),
            'cnpj'     => preg_replace('/\D/', '', $request->input('cnpj')),
            'reason_name'       => $request->input('reason'),
            'status'       => $request->input('status'),
        ];
        return $values;
    }
}
