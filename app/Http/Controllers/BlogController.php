<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected array $validationRules = [
        
        'titulo' => 'required|max:255|min:2',
        'autor' => 'required|string|max:255|min:2',
        'etiquetas' => 'required|string|max:255',
        'contenido' => 'required|string',
        
    ];

    protected array $validationMessages = [
        'titulo.required' => 'El título es obligatorio.',
        'titulo.string' => 'El título debe ser una cadena de caracteres.',
        'titulo.max' => 'El título no puede tener menos de 2 caracteres.',
        'titulo.max' => 'El título no puede tener más de 255 caracteres.',
        'autor.required' => 'El autor es obligatorio.',
        'autor.string' => 'El autor debe ser una cadena de caracteres.',
        'autor.max' => 'El autor no puede tener menos de 2 caracteres.',
        'autor.max' => 'El autor no puede tener más de 255 caracteres.',
        'etiquetas.required' => 'Las etiquetas son obligatorias.',
        'etiquetas.string' => 'Las etiquetas deben ser una cadena de caracteres.',
        'etiquetas.max' => 'Las etiquetas no pueden tener más de 255 caracteres.',
        'contenido.required' => 'El contenido es obligatorio.',
        'contenido.string' => 'El contenido debe ser una cadena de caracteres.',
    ];
    
    public function bringAll()
    {
        $blog = Blog::all();
        // dd($blog);

        return view('blog.index', [
            'blog' => $blog, 
        ]);
    }

    public function view(int $id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog.view', [
            'blog' => $blog,
        ]);
    }

    public function createForm()
    {
        return view('blog.create-form');
    }

    public function createProcess(Request $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);
        
        
        $input = $request->only(['titulo', 'etiquetas', 'autor', 'contenido']);
        $input['fecha_publicacion'] = now();

        Blog::create($input);

        return redirect()
            ->route('blog.index')
            ->with('feedback.message', 'La noticia ' .  e($input['titulo']) . 'se publicó correctamente.')
            ->with('feedback.type', 'success');
    }

    public function editForm(int $id)
    {
        return view('blog.edit-form', [
            'blog' => Blog::findOrFail($id),
        ]);   
    }

    public function editProcess(int $id, Request $request)
    {

        $blog = Blog::findOrFail($id);

        $request->validate($this->validationRules, $this->validationMessages);

        $input = $request->only(['titulo', 'etiquetas', 'autor', 'contenido']);

        $blog->update($input);

        return redirect()
            ->route('blog.index')
            ->with('feedback.message', 'La noticia ' .  e($blog->titulo) . 'se editó correctamente.')
            ->with('feedback.type', 'success');
    }

    public function deleteForm(int $id)
    {
        return view('blog.delete-form', [
            'blog' => Blog::findOrFail($id),
        ]);   
    }

    public function deleteProcess(int $id)
    {
        $blog = Blog::findOrFail($id);

        try {
            $blog->delete();

            return redirect()
                ->route('blog.index')
                ->with('feedback.message', 'La noticia ' .  e($blog->titulo) . ' se eliminó correctamente.')
                ->with('feedback.type', 'success');

        } catch(\Exception $e) {
            
            return redirect()
                ->route('blog.index')
                ->with('feedback.message', 'Ocurrió un error al eliminar la noticia.')
                ->with('feedback.type', 'danger');
        }
    }
}
