<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class DiscosController extends Controller
{

    protected array $validationRules = [
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'lanzamiento' => 'required',
        'duracion' => 'required|numeric',
        'imagen_portada' => 'nullable'
    ];

    protected array $validationMessages = [
        'nombre.required' => 'El nombre debe tener un valor.',
        'precio.required' => 'El precio debe tener un valor.',
        'precio.numeric' => 'El precio debe ser un valor numérico.',
        'lanzamiento.required' => 'La fecha de lanzamiento debe tener un valor.',
        'duracion.required' => 'La duración debe tener un valor.',
        'duracion.numeric' => 'La duración debe ser un valor numérico.',
        'cantidad_canciones.required' => 'La cantidad de canciones debe tener un valor.'
    ];

    public function all()
    {
        $discos = Disco::with('generos')->get();

        return view('discos.index', [
            'discos' => $discos,
        ]);
    }

    public function view(int $id)
    {
        $disco = Disco::FindOrFail($id);
        return view('discos.view', [
            'disco' => $disco,
        ]);
    }

    public function createForm()
    {
        return view('discos.create-form', [
            'generos' => Genero::all()
        ]);
    }

    public function createProcess(Request $request)
    {

        $request->validate($this->validationRules, $this->validationMessages);

        $input = $request->only(['nombre', 'lanzamiento', 'precio', 'genero', 'duracion', 'cantidad_canciones', 'imagen_portada']);

        try {

            if($request->hasFile('imagen_portada')) {
                $input['imagen_portada'] = $request->file('imagen_portada')->store('imgs');
            }

            DB::beginTransaction();

            $disco = Disco::create($input);

            $disco->generos()->attach($request->input('genero_fk'), []);

            DB::commit();

            return redirect()
                ->route('discos.index')
                ->with('feedback.message', 'El disco ' . e($input['nombre']) . ' fue guardado');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

            return redirect()
                ->back(fallback: route('discos.create.form'))
                ->with('feedback.message', 'Ocurrió un error al crear el disco.');

        }
    }

    public function editForm(int $id)
    {
        return view('discos.edit-form', [
            'disco' => Disco::findOrFail($id),
            'generos' => Genero::all()
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $disco = Disco::findOrFail($id);

        $request->validate($this->validationRules, $this->validationMessages);

        $input = $request->only(['nombre', 'lanzamiento', 'precio', 'genero', 'duracion', 'cantidad_canciones', 'imagen_portada']);

        $portaVieja = $disco->imagen_portada;

        try {
            if ($request->hasFile('imagen_portada')) {
                $input['imagen_portada'] = $request->file('imagen_portada')->store('img');
            }

            DB::transaction(function() use ($input, $disco, $request) {
                $disco->update($input);
                $disco->generos()->sync($request->input('genero_fk', []));
            });

            if ($request->hasFile('imagen_portada') && $portaVieja !== null) {
                Storage::delete($portaVieja);
            }

            return redirect()
                ->route('discos.index')
                ->with('feedback.message', 'El disco ' . htmlspecialchars_decode(e($input['nombre'])) . ' se editó con éxito');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->route('discos.index')
                ->with('feedback.message', 'Ocurrió un error al editar el disco.');
        }
    }


    public function deleteForm(int $id)
    {
        return view('discos.delete-form', [
            'disco' => Disco::findOrFail($id),
        ]);
    }

    public function deleteProcess(int $id)
    {
        $disco = Disco::findOrFail($id);

        try {

            $disco->generos()->detach();

            $disco->delete();

            if($disco->imagen_portada && Storage::exists($disco->imagen_portada)) {

                Storage::delete($disco->imagen_portada);

            }

            return redirect()
                ->route('discos.index')
                ->with('feedback.message', 'El disco ' . e($disco->nombre) . ' se eliminó correctamente.')
                ->with('feedback.type', 'success');
                
        } catch(\Exception $e) {
            
            return redirect()
            ->route('discos.index')
            ->with('feedback.message', 'Ocurrió un error al eliminar el disco.')
            ->with('feedback.type', 'danger');
        }
        
    }

}
