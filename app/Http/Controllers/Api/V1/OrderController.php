<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getCategory()
    {
        return Category::select('id', DB::raw('CONCAT(name,"-",name_kh) AS text'))->get();
    }

    public function getTable()
    {
        return Table::select('id', 'name')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'total_pay' => 'required|numeric|min:100',
            'cash_in' => 'required|numeric|min:100|gte:total_pay',
        ]);

        $data = Order::create([
            'order_at' => now(),
            'table_id' => $request->{'table_id'},
            'user_id' => $request->{'user_id'},
            'customer_id' => 1,
            'total_pay' => $request->{'total_pay'},
            'cash_in' => $request->{'cash_in'}
        ]);

        $items = [];
        foreach ($request->{'datas'} as $item){
            $map = [];
            $map['order_id'] = $data->id;
            $map['product_id'] = $item['id'];
            $map['price'] = $item['price'];
            $map['quantity'] = $item['quantity'];

            $items[] = $map;
        }
        $data->product()->sync($items);

        return response(['message' => 'Successfully saved !', 'data' => $data]);
    }
}