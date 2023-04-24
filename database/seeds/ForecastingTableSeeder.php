<?php

use Illuminate\Database\Seeder;

class ForecastingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $years = 2017;
        $startprice = 3.86;

        for ($i = 1970; $i <= $years; $i++) {
            $startprice = 3.86;
            if (1980 < $i || $i < 1989) {
                $startprice = $startprice + 60;
            } elseif (1990 < $i || $i < 1999) {
                $startprice = $startprice + 90;
            } elseif (2000 < $i || $i < 2009) {
                $startprice = $startprice + 70;
            } elseif (2010 < $i || $i < 2019) {
                $startprice = $startprice + 110;
            }

            $startdate = $i.'-1-1';
            $enddate = $i.'-12-31';

            $begin = new \DateTime($startdate);
            $end = new \DateTime($enddate.'+1 days');

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                \App\Forecasting::create(['date'=>$dt->format('Y-m-d'), 'price'=>mt_rand($startprice, $startprice + 0.15), 'constraint'=>'Dollar Rise']);
            }
        }
    }
}
