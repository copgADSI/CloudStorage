<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Storage as ModelsStorage;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;

/**
 * Class FileController
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $id =  auth()->id();
        $storage = ModelsStorage::where('user_id', '=', $id);
    }
    public function index()
    {

        /*  $files = File::join('storages', 'storages.id', '=', 'files.storage_id')
             ->where('files.storage_id', '=', $storage->id)->paginate();
             return $files; */

        $id =  auth()->id();
        $storage = ModelsStorage::where('user_id', $id)
            ->first(); //Obtenemos un obj con el storage del usuario 

        $files = File::where('files.storage_id', '=', $storage->id)->paginate();

        return view('file.index', compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * $files->perPage());
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $file = new File();
        $categories = Category::all(); //
        return view('file.create', compact('file', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(File::$rules);

        $bytes = $request->file('file')->getSize();

        //Determinando el peso del archivo a guardar en bytes
        //1048576 Pasar bytes a MB y tomamos dos unidades despues de la coma
        // 1024 para pasar de MB a GB
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2); #B a MB
            $gb = number_format($bytes / 1024, 5); #MB a GB
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1048576, 2); #B a MB

            $gb = number_format($bytes / 1024, 5); #MB a GB
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }


        $id =  auth()->id();
        $storage = ModelsStorage::where('user_id', '=', $id)->first(); //Obtenemos un array con el storage del usuario 
        $file = $request->file('file')->store('public/uploads'); // Storage/app/public/uploads
        $extension =  $request->file('file')->extension();
        if (empty($extension)) {
            $extension = 'NA';
        }

        $url  = Storage::url($file); //Accedo directo

        $query =  File::create([
            'file' => $url,
            'fileName' => $request->fileName,
            'fileType' => $extension,
            'fileSize' => $gb,
            'storage_id' => $storage->id,
            'category_id' => $request->category_id
        ]);

        $storage = ModelsStorage::find($storage->id);
        $storage->capacity -= $gb;
        $storage->update();
        //Actualizamos el almacenamiento de la unidad
        return redirect()->route('files.index')
            ->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);

        return view('file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);

        return view('file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  File $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        request()->validate(File::$rules);

        $file->update($request->all());

        return redirect()->route('files.index')
            ->with('success', 'File updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $file = File::find($id)->delete();

        return redirect()->route('files.index')
            ->with('success', 'File deleted successfully');
    }
    public function files()
    {


        $id =  auth()->id();
        $created_at = User::all();
        $files = File::join('storages', 'storages.id', '=', 'files.storage_id')
            ->where('user_id', '=', $id)->paginate();
        return response()->json([
            'results' => $files, $created_at
        ], 200);
    }
    public function download($file)
    {

        $path = File::find($file);

        $download = $path->downloads += 1; //Acumentamos las descargas hechas
        $path->update();
        $path = explode('/storage', $path->file);
        return Storage::download('public/' . $path[1]);
    }
}


/* if ($bytes >= 1073741824)
{
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
}
elseif ($bytes >= 1048576)
{
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
}
elseif ($bytes >= 1024)
{
    $bytes = number_format($bytes / 1024, 2) . ' KB';
}
elseif ($bytes > 1)
{
    $bytes = $bytes . ' bytes';
}
elseif ($bytes == 1)
{
    $bytes = $bytes . ' byte';
}
else
{
    $bytes = '0 bytes';
}

return $bytes; */