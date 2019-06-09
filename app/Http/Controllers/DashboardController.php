<?php

namespace Upanel\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Upanel\Item;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $year = date('Y');

        $entries = DB::table('entries as i')->select(
            DB::raw('MONTHNAME(i.created_at) as month'),
            DB::raw('YEAR(i.created_at) as year'),
            DB::raw('SUM(i.total) as total')
        )
            ->whereYear('i.created_at', $year)
            ->groupBy(DB::raw('MONTHNAME(i.created_at)'),
                DB::raw('YEAR(i.created_at)'
                ))
            ->whereState("Activa")
            ->get();

        $sales = DB::table('sales as s')->select(
            DB::raw('MONTHNAME(s.created_at) as month'),
            DB::raw('YEAR(s.created_at) as year'),
            DB::raw('SUM(s.total) as total')
        )
            ->whereYear('s.created_at', $year)
            ->groupBy(DB::raw('MONTHNAME(s.created_at)'),
                DB::raw('YEAR(s.created_at)'
                ))
            ->whereState("Activa")
            ->get();

        return [
            'entries' => $entries,
            'sales' => $sales,
            'year' => $year,
        ];
    }

    public function itemsNotification(Request $request)
    {
        if (!$request->ajax()) return redirect('/main');

        $items = Item::all();
        $itemsNotificationsStock = [];
        $itemsNotificationsExpirationDate = [];

        foreach ($items as $item) {
            $expiration_date_threshold = $item->expiration_date->subDays($item->expiration_threshold);

            if ($item->stock <= $item->stock_threshold) {
                $itemsNotificationsStock[] = $item;
            }

            if ($expiration_date_threshold <= Carbon::now()) {
                $itemsNotificationsExpirationDate[] = $item;
            }

        }
        return [
            'itemsNotificationsStock' => $itemsNotificationsStock,
            'itemsNotificationsExpirationDate' => $itemsNotificationsExpirationDate,
        ];
    }

    public function view()
    {
        return view('dashboard');
    }
}
