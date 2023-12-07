<?php
namespace App\Http\Traits;


trait ResponseTrait {

    /**
     * Formatted response
     */
    public function commonResponse($data = null, $message = null, $status = true) {

        return response()->json([
            'data' => empty($data) ? [] : $data,
            'message' => $message,
            'status' => $status == true ? 'success' : 'failure'
        ]);
    }
}