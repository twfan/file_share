<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Log;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::all();
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        // dd($request->idFile);
        $validatedData = $request->validate([
            'title' => 'required',
            'filename' => 'required',
        ]);
        $file = $request->all();

        if($request->idFile == ""){
            // dd($request->idFile);
            $file['uuid'] = (string)Uuid::generate();
            $file['filename'] =  $request->title;
            if($request->hasFile('filename')){
                $file['file'] = $request->filename->getClientOriginalName();
                $request->filename->storeAs('files-upload/'.$file['uuid'], $file['file']);
            }
        }else{
            $fileUpdate = File::find($request->idFile);
            $file['uuid'] = $fileUpdate->uuid;
            $file['filename'] = $request->title;
           
            $oldFile = $fileUpdate->file;
            $oldFilePath = 'app/files-upload/'.$fileUpdate->uuid.'/'.$oldFile;

            // $deleteOldFile = Storage::deleteDirectory($oldFilePath);
            $deleteOldFile = unlink(storage_path($oldFilePath));
            $deleteFolder = File::deleteDirectory(public_path('path/to/folder'));

            
            if($request->hasFile('filename')){
                $file['file'] = $request->filename->getClientOriginalName();
                $request->filename->storeAs('files-upload/'.$file['uuid'], $file['file']);
            }
            // dd("tes");
            // dd($file);
        }

        
        $id = $request->idFile;
        // dd($id);
        $File = File::updateOrCreate(['id' => $id],['uuid' => $file['uuid'], 'filename' => $request->title, 'file' => $file['file']]);
        if(empty($id)){
            $log = new Log;
            $log->file_id = $File->id;
            $log->user_id = $user->id;
            $log->username = $user->name;
            $log->activity = "Create and upload new file";
            $log->save();

        }else{
            $log = new Log;
            $log->file_id = $id;
            $log->user_id = $user->id;
            $log->username = $user->name;
            $log->activity = "Update file data";
            $log->save();
        }
        
        return redirect()->route('admin.home');
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
        $fileToEdit = \App\File::findOrFail($id);
        return $fileToEdit;

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
        
        $file = \App\File::findOrFail($id);
       
        $oldFile = $file->file;
        $oldFilePath = 'app/files-upload/'.$file->uuid.'/'.$oldFile;
        $deleteOldFile = unlink(storage_path($oldFilePath));

        
        $user = Auth::user();
        

        $file->delete();

        $log = new Log;
        $log->file_id = $id;
        $log->user_id = $user->id;
        $log->username = $user->name;
        $log->activity = "Delete file";
        $log->save();

        return redirect()->route('admin.home')->with('status', 'Category successfully moved to trash');
    }

    public function download($uuid)
    {

        $file = \App\File::where('uuid', $uuid)->get();
        // dd($file[0]->id);
        $user = Auth::user();
        $log = new Log;
        $log->file_id = $file[0]->id;
        $log->user_id = $user->id;
        $log->username = $user->name;
        $log->activity = "Download file";
        $log->save();
        if(!empty($user)){
            $file = File::where('uuid', $uuid)->firstOrFail();
            $pathToFile = storage_path('app/files-upload/'.$file->uuid.'/' . $file->file);
            return response()->download($pathToFile);
        }
       
    }

    public function showLog($id){
        $file = Log::where('file_id',$id)->orderBy('id','DESC')->get();
        return ["data" => $file];
    }
}
