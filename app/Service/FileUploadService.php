<?php
namespace App\Service;
use Illuminate\Support\Facades\Storage;
class FileUploadService{
    public function imageUpload($request, $model, $path = 'public/uploads'){
        if ($request->hasFile('file')) {
            $uploaded_file = $request->file('image');
            $file_extension = $uploaded_file->getClientOriginalExtension();

            // Check if the model has an existing file and delete it
            if ($model->file) {
                Storage::delete($model->image);
            }
            $file_upload_url = Storage::putFileAs($path, $uploaded_file, $model->id . '.' . $file_extension, 'public');

            $model->file = $file_upload_url;
            $model->save();

            return Storage::url($file_upload_url);
        }
    }
}


