<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function callback(Request $request)
    {
        $content = $request->getContent();

        $datasetRequestPayment = json_decode($content, true);

        $order = Order::where('order_id', $datasetRequestPayment["transaction"]["id"]);

        if ($order) {

            DB::table('orders')
                ->where('order_id', $datasetRequestPayment["transaction"]["id"])
                ->update(['status' => $datasetRequestPayment["transaction"]["status"]]);

        }
        else{
            $user = new Order;
            $user->order_id = $datasetRequestPayment["transaction"]["id"];
            $user->status = $datasetRequestPayment["transaction"]["status"];

            $user->save();
        }

        return json_encode(['status' => $datasetRequestPayment["transaction"]["status"]]);

    }

    /**
     * @param Request $request
     * @return string
     */
    public function success(Request $request)
    {
        return view('success');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fail(Request $request)
    {
        return view('fail');
    }
}
