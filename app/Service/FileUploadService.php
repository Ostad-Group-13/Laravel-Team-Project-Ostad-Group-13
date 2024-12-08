<?php
namespace App\Service;
class FileUploadService{
    public function imageUpload($request, $model, $path = 'uploads/'){
        if ($request->hasFile('image')) {
            $uploaded_file = $request->file('image');
            $file_extension = $uploaded_file->getClientOriginalExtension();
            $target_path = public_path($path);

            if (!file_exists($target_path)) {
                mkdir($target_path, 0755, true);
            }

            $file_name = $model->id . '_' . time() . '.' . $file_extension;
            $uploaded_file->move($target_path, $file_name);

            if ($model->image) {
                $old_file = public_path($model->image);
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
            }

            $model->image = $path . $file_name;
            $model->save();

            return asset($path . $file_name);
        }

        return null;
    }
}


