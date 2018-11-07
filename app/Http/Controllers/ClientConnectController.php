<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\Client\ClientDataService;

class ClientConnectController extends Controller
{
    private $client;

    public function __construct(ClientDataService $client)
    {
        $this->client = $client;
    }

    public function setBaseGameInfo(Request $request)
    {
        $rules = [
            "id" => ['required', 'string'],
            "game" => ['required', 'integer', 'min:0'],
            "setting" => ['required', 'integer', 'min:1', 'max:6'],
            "hits" => ['required', 'array'],
            "hits.*.hitNo" => ['required', 'integer', 'min:1'],
            "hits.*.count" => ['required', 'integer', 'min:0'],
            "in" => ['required', 'integer', 'min:0'],
            "out" => ['required', 'integer', 'min:0'],
            "ren" => ['required', 'integer', 'min:0'],
        ];
        $input = $request->only([
            'id',
            'game',
            'setting',
            'hits',
            'in',
            'out',
            'ren',
        ]);

        $validator = Validator::make($input, $rules);

        $ret = [
            'result' => false,
        ];
        $code = 200;
        if ($validator->fails()) {
            // NG
            $code = 500;
        } else {
            $ret = $this->client->setBaseGameData($input);
        }

        return response()->json($ret, $code);
    }
}
