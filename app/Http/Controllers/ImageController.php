<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;

class ImageController extends Controller
{
    private $image;

    public function __construct(ImageService $image) {
        $this->image = $image;
    }

    /**
     * imageを取得する
     */
    public function getImage(Request $request, $machine_id, $hit_name) {
        $path = $this->image->getImageByName($machine_id, $hit_name);
        if($path !== null) {
            $data = base64_encode(file_get_contents($path));

            // return response()->download($path);

            return [
                'result' => true,
                'data' => $data,
            ];
        } else {
            return $request->response('', 404);
        }
    }
}
