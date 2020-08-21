<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RankingsController extends Controller
{
    //
    public function getRankings()
    {
        return view('reports.rankings.ranking');
    }

    public function rankAgents(Request $request)
    {
        function rank($type, $product, $startDate, $endDate)
        {
            if ($product == 0) {
                if ($type == 'earnings') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT SUM(a.commission) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (1,2,5,6,7,26,57,51)
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
                if ($type == 'transactions') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT COUNT(*) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (1,2,5,6,7,26,57,51)
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
            }
            if ($product == 101) {
                if ($type == 'earnings') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT SUM(a.commission) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (1,3)
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
                if ($type == 'transactions') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT COUNT(*) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (1,3)
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
            }

            if ($product == 102) {
                if ($type == 'earnings') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT SUM(a.commission) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (2,4)
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
                if ($type == 'transactions') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT COUNT(*) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (2,4)
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
            }
            if ($product == 102) {
                if ($type == 'earnings') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT SUM(a.commission) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id = 5
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
                if ($type == 'transactions') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT COUNT(*) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id = 5
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
            } else {
                if ($type == 'earnings') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT SUM(a.commission) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (1,2,5,6,7,26,57,51)
                         AND product_id = $product
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')

                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
                if ($type == 'transactions') {
                    $ranking = DB::connection('mysql2')->select(DB::raw(
                        "SELECT COUNT(*) as value, b.name FROM transaction a, agent b
                         WHERE a.transaction_type_id IN (1,2,5,6,7,26,57,51)
                         AND product_id = $product
                         AND a.date BETWEEN '$startDate' AND '$endDate'
                         AND (a.description NOT LIKE 'REVERSED%')
                         AND (a.description NOT LIKE '%PreAuth%')
                         AND a.description IS NOT NULL
                         AND a.agent_id = b.id
                         GROUP BY agent_id"
                    ));
                    return $ranking;
                }
            }

        }

        return json_encode(rank($request->type, $request->product, $request->startDate, $request->endDate));

    }
}
