<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Resultados_deportivos;

class Resultados_deportivos_controller extends Controller
{
    public function resultados($word = ""){
        $words = explode(' ', $word);

        $resultados = Resultados_deportivos::where(
            function ($query) use($words) {
             for ($i = 0; $i < count($words); $i++){
                $query->orWhere('LOCAL', 'like',  '%' . $words[$i] .'%');
                $query->orWhere('VISITANTE', 'like',  '%' . $words[$i] .'%');
             }
        })->get();

        return $resultados;
    }

    public function getTemporadas(){
        $temporadas = Resultados_deportivos::select('TEMPORADA')
        ->groupBy('TEMPORADA')
        ->orderBy('TEMPORADA','DESC')
        ->get();

        return $temporadas;
    }

    public function equipos($word = ""){
        $words = explode(' ', $word);
        $equipos = Resultados_deportivos::select('LOCAL')
        ->where(
            function ($query) use($words) {
             for ($i = 0; $i < count($words); $i++){
                $query->orWhere('LOCAL', 'like',  '%' . $words[$i] .'%');
             }
        })->groupBy('LOCAL')->get();

        return $equipos;
    }

    public function detail($equipo) {

        $info = Resultados_deportivos::where('LOCAL', $equipo)
        ->orWhere('VISITANTE', $equipo)
        ->get();

        $temporadas = Resultados_deportivos::select('TEMPORADA')
        ->groupBy('TEMPORADA')
        ->orderBy('TEMPORADA','DESC')
        ->where('LOCAL', $equipo)
        ->orWhere('VISITANTE', $equipo)
        ->get();

        $i = 0;
        
        foreach($temporadas as $temporada){
            $partidos_jugados = 0;
            $partidos_ganados = 0;
            $partidos_empatados = 0;
            $goles_favor = 0;
            $goles_contra = 0;
            foreach($info as $item) {
                if($item->TEMPORADA === $temporada->TEMPORADA) {
                    $partidos_jugados += 1;
                    if($item->LOCAL == $equipo && $item->GOL_LOCAL > $item->GOL_VISITANTE || $item->VISITANTE == $equipo && $item->GOL_VISITANTE > $item->GOL_LOCAL) {
                        $partidos_ganados += 1;
                    }
                    if($item->LOCAL == $equipo && $item->GOL_LOCAL == $item->GOL_VISITANTE || $item->VISITANTE == $equipo && $item->GOL_VISITANTE == $item->GOL_LOCAL) {
                        $partidos_empatados += 1;
                    }
                    if($item->LOCAL == $equipo) {
                        $goles_favor += $item->GOL_LOCAL;
                        $goles_contra += $item->GOL_VISITANTE;
                    }
                    if($item->VISITANTE == $equipo) {
                        $goles_favor += $item->GOL_VISITANTE;
                        $goles_contra += $item->GOL_LOCAL;
                    }

                    $data[$i]['temporada'] = $temporada->TEMPORADA;
                    $data[$i]['partidos_jugados'] = $partidos_jugados;
                    $data[$i]['partidos_jugados'] = $partidos_jugados;
                    $data[$i]['partidos_ganados'] = $partidos_ganados;
                    $data[$i]['partidos_empatados'] = $partidos_empatados;
                    $data[$i]['goles_favor'] = $goles_favor;
                    $data[$i]['goles_contra'] = $goles_contra;
                }
            }
            $i++;
        }
        
        return $data;
    }
}
