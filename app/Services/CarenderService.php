<?php

namespace App\Services;

use Carbon\Carbon;

class CarenderService
{
    /**
     * カレンダーデータを返却する
     *
     * @return array
     */
    public function getWeeks()
    {
        $weeks = [];
        $week = '';

        $dt = new Carbon(self::getYm_firstday());
        $day_of_week = $dt->dayOfWeek;     // 曜日
        $days_in_month = $dt->daysInMonth; // その月の日数
        // dd($day_of_week);
        // 第 1 週目に空のセルを追加
        $week .= str_repeat('<td></td>', $day_of_week);
        // dd($week);
        for ($day = 1; $day <= $days_in_month; $day++, $day_of_week++) {
            $date = self::getYm() . '-' . $day;
            // dd($date); 年-月-($day++)
            // dd($day_of_week);
            if (Carbon::now()->format('Y-m-j') === $date) {
                $week .= '<td class="today"><a href="#">' . $day;
            } else {
                $week .= '<td><a href="#">' . $day;
            }
            $week .= '</a></td>';
            // 週の終わり、または月末
            //$dayと$day_of_weekは28~30まで増える
            //$day_of_weekが土曜日、または$dayが月末の時
            if (($day_of_week % 7 === 6) || ($day === $days_in_month)) {
                if ($day === $days_in_month) {
                    $week .= str_repeat('<td></td>', 6 - ($day_of_week % 7));
                }
                $weeks[] = '<tr>' . $week . '</tr>';
                $week = '';
            }
        }
        return $weeks;
    }

    /**
     * month 文字列を返却する
     *
     * @return string
     */
     //URLでGETした日付formatして返す
    public function getMonth()
    {
        return Carbon::parse(self::getYm_firstday())->format('Y年n月');
    }

    /**
     * prev 文字列を返却する
     *
     * @return string
     */
     //URLでGETした日付から一ヶ月前を返す
    public function getPrev()
    {
        return Carbon::parse(self::getYm_firstday())->subMonthsNoOverflow()->format('Y-m');
        // return Carbon::parse(self::getYm_firstday())->subMonthsNoOverflow()->toDateString();同じ
    }

    /**
     * next 文字列を返却する
     *
     * @return string
     */
     //URLでGETした日付から一ヶ月後を返す
    public function getNext()
    {
        return Carbon::parse(self::getYm_firstday())->addMonthNoOverflow()->format('Y-m');
    }

    /**
     * GET から Y-m フォーマットを返却する
     *
     * @return string
     */
    private static function getYm()
    {
        //もしURLにymがあればそれを返す
        if (isset($_GET['ym'])) {
            // dd($_GET['ym']);
            return $_GET['ym'];//urlに入力されたymをgetしている//
        }
        //なければ今の時間のy-mを返す(年と月)
        return Carbon::now()->format('Y-m');
    }

    /**
     * 2019-09-01 のような月初めの文字列を返却する
     *
     * @return string
     */
    private static function getYm_firstday()
    {
        
        return self::getYm() . '-01';
    }
}