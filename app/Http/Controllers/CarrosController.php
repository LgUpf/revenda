<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use App\http\Requests\CarroRequest;
class CarrosController extends Controller
{
    public function index (){
     $carros = Carro::orderBy('modelo')->paginate(4);
       return view('carros.index', ['carros'=>$carros]);
    }
    public function create (){
        return view('carros.create');
    }
    public function store (CarroRequest $request){
        $novo_carro = $request->all();
        Carro::create($novo_carro);
        return redirect()->route('carros');

    }
    public function destroy($id){
        Carro::find($id)->delete();
        return redirect()->route('carros');
    }
    public function edit($id){
        $carro = Carro::find($id);
        return view('carros.edit', compact('carro'));
    }

    public function update(CarroRequest $request, $id){
        Carro::find($id)->update($request->all());
        return redirect()->route('carros');
    }
}