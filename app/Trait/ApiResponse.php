<?php
namespace App\Trait;

trait ApiResponse {
    public function ResponseSuccess($data, $message = "Successfull", $status = "success", $status_code = 200){
        return response()->json([
            'status' => $status,
            'status_code' => $status_code,
            'message' => $message,
            'data' => $data
           ]);
    }

    public function ResponseError($errors, $message="Data Process Error", $status = "error", $status_code = 400){
        return response()->json([
            'status' => $status,
            'status_code' => $status_code,
            'message' => $message,
            'errors' => $errors
           ]);
    }
}
