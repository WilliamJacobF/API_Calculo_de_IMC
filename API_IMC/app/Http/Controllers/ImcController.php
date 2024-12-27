<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function calcularIMC(Request $request){
        $request->validate([
            'peso' => 'required|numeric|min:1',
            'altura' => 'required|numeric|min:0.1',
        ]);

        $peso = $request->input('peso');
        $altura = $request->input('altura');

        $imc = $peso / ($altura ** 2);

        $classificacao = '';
        if ($imc < 18.5) {
            $classificacao = 'Baixo peso';
        } elseif ($imc < 24.9) {
            $classificacao = 'Peso normal';
        } elseif ($imc < 29.9) {
            $classificacao = 'Sobrepeso';
        } else {
            $classificacao = 'Obesidade';
        }

        return response()->json([
            'imc' => round($imc, 2),
            'classificacao' => $classificacao,
        ]);
    }

}
