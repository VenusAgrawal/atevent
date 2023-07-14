<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_content = Storage::get('MOCK_DATA_transaction.json');
        $transactions = json_decode($file_content);

        foreach ($transactions as $transaction) {
            DB::table('transaction')->insert(
                [
                    'total_price' => $transaction->total_price,
                    'startdate' => $transaction->startdate,
                    'enddate' => $transaction->enddate,
                    'status' => $transaction->status,
                    'cardname' => $transaction->cardname,
                    'cardnumber' => $transaction->cardnumber,
                    'cardexp' => $transaction->cardexp,
                    'cardcvv' => $transaction->cardcvv,
                    'cardtype' => $transaction->cardtype,
                    'properties_id' => $transaction->properties_id,
                    'users_id' => $transaction->users_id,
                ]
            );
        }
    }
}
