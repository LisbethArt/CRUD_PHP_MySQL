<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyectos;
use Exception;
use PDF;

class ProyectosController extends Controller
{
    public function home() {
        try {
            $proyectos = Proyectos::all();
            return view('home', compact('proyectos'));
        } catch (Exception $e) {
            return redirect()->route('proyectos.home')->with('error', 'Error al traer los proyectos: ' . $e->getMessage());
        }
    }

    public function add() {
        return view('agregar');
    }

    public function store(Request $request) {
        try {
            $proyecto = new Proyectos();
            $proyecto->nombreProyecto = $request->nombreProyecto;
            $proyecto->fuenteFondos = $request->fuenteFondos;
            $proyecto->montoPlanificado = $request->montoPlanificado;
            $proyecto->montoPatrocinado = $request->montoPatrocinado;
            $proyecto->montoFondosPropios = $request->montoFondosPropios;
            $proyecto->save();
        
            return redirect()->route('proyectos.home')->with('success', 'Proyecto agregado correctamente.');
        } catch (Exception $e) {
            return redirect()->route('proyectos.home')->with('error', 'Error al agregar el proyecto: ' . $e->getMessage());
        }
    }
    
    public function edit($id) {
        try {
            $proyecto = Proyectos::findOrFail($id);
            return view('editar', compact('proyecto'));
        } catch (Exception $e) {
            return redirect()->route('proyectos.home')->with('error', 'Error al traer el proyecto: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id) {
        try {
            $proyecto = Proyectos::findOrFail($id);
            $proyecto->nombreProyecto = $request->nombreProyecto;
            $proyecto->fuenteFondos = $request->fuenteFondos;
            $proyecto->montoPlanificado = $request->montoPlanificado;
            $proyecto->montoPatrocinado = $request->montoPatrocinado;
            $proyecto->montoFondosPropios = $request->montoFondosPropios;
            $proyecto->save();
        
            return redirect()->route('proyectos.home')->with('success', 'Proyecto actualizado correctamente.');
        } catch (Exception $e) {
            return redirect()->route('proyectos.home', $id)->with('error', 'Error al actualizar el proyecto: ' . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $proyecto = Proyectos::findOrFail($id);
            $proyecto->delete();
    
            return redirect()->route('proyectos.home')->with('success', 'Proyecto eliminado correctamente.');
        } catch (Exception $e) {
            return redirect()->route('proyectos.home')->with('error', 'Error al eliminar el proyecto: ' . $e->getMessage());
        }
    }

    public function generatePDF() {
        $proyectos = Proyectos::all();
        if ($proyectos->isEmpty()) {
            return redirect()->route('proyectos.home')->with('error', 'Para ver el PDF debes de tener al menos un registro.');
        }
        $currentDateTime = \Carbon\Carbon::now('America/El_Salvador')->format('d/m/Y H:i:s');
        $pdf = PDF::loadView('pdf', compact('proyectos', 'currentDateTime'));
        $fileName = 'Proyectos_' . \Carbon\Carbon::now('America/El_Salvador')->format('dmY_Hi') . '.pdf';
        return $pdf->stream($fileName);
    }
    
    public function downloadPDF() {
        $proyectos = Proyectos::all();
        if ($proyectos->isEmpty()) {
            return redirect()->route('proyectos.home')->with('error', 'Para descargar el PDF debes de tener al menos un registro.');
        }
        $currentDateTime = \Carbon\Carbon::now('America/El_Salvador')->format('d/m/Y H:i:s');
        $pdf = PDF::loadView('pdf', compact('proyectos', 'currentDateTime'));
        $fileName = 'Proyectos_' . \Carbon\Carbon::now('America/El_Salvador')->format('dmY_Hi') . '.pdf';
        return $pdf->download($fileName);
    }
}