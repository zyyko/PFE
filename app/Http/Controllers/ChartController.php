<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chartshow() 
    {
        // Total Reservation per month : 
        $reservationsByMonth = DB::table('immobiliers_réservés')
        ->join('immobiliers', 'immobiliers_réservés.ID_IMMOBILIER', '=', 'immobiliers.ID_IMMOBILIER')
        ->select(
            DB::raw('MONTH(immobiliers_réservés.DATE_RESERVATION) as month_number'),
            DB::raw('COUNT(immobiliers_réservés.ID_IMMOBILIER) as total_reservations'),
        )
        ->groupBy(DB::raw('MONTH(immobiliers_réservés.DATE_RESERVATION)'))
        ->orderBy(DB::raw('MONTH(immobiliers_réservés.DATE_RESERVATION)'))
        ->get();
        //#############################################################
        $priceByMonth = DB::table('immobiliers_réservés')
        ->join('immobiliers', 'immobiliers_réservés.ID_IMMOBILIER', '=', 'immobiliers.ID_IMMOBILIER')
        ->select(
            DB::raw('MONTH(immobiliers_réservés.DATE_RESERVATION) as month_number'),
            DB::raw('SUM(immobiliers.Prix) as total_price') // Assuming there's a column for the price in immobiliers table
        )
        ->groupBy(DB::raw('MONTH(immobiliers_réservés.DATE_RESERVATION)'))
        ->orderBy(DB::raw('MONTH(immobiliers_réservés.DATE_RESERVATION)'))
        ->get();
        //#############################################################
        $inscriptionByMonth = DB::table('reservateur')
        ->select(DB::raw('MONTH(date_inscription) as month, COUNT(*) as total '))
        ->groupBy(DB::raw('MONTH(date_inscription)'))
        ->get();
        //################################################################
        $reservationsByType = DB::table('immobiliers_réservés')
        ->join('immobiliers', 'immobiliers_réservés.ID_IMMOBILIER', '=', 'immobiliers.ID_IMMOBILIER')
        ->select('immobiliers.TYPE', DB::raw('COUNT(*) as total'))
        ->groupBy('immobiliers.TYPE')
        ->get();
        
        $totalReservations = $reservationsByType->sum('total');

        $percentageByType = [];

        foreach ($reservationsByType as $reservation) {
            $percentage = ($reservation->total / $totalReservations) * 100;
            $percentageByType[$reservation->TYPE] = $percentage;
        }

        
        

        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $totalReservationsPerMonth = "";
        foreach ($reservationsByMonth as $value) {
            if (isset($months[$value->month_number])) {
                $totalReservationsPerMonth .= "['" . $months[$value->month_number] . "'," . $value->total_reservations . "],";
            }
        }
        $totalPricePerMonth = "";
        foreach ($priceByMonth as $value) {
            if (isset($months[$value->month_number])) {
                $totalPricePerMonth .= "['" . $months[$value->month_number] . "'," . $value->total_price . "],";
            }
        }

        $totalRegisrationsPerMonth = "";
        foreach ($inscriptionByMonth as $value) {
            if(isset($months[$value->month])) {
                $totalRegisrationsPerMonth .= "['" . $months[$value->month] . "'," . $value->total . "],";
            }
        }
        
     

        return view("admin.statistiques.line-chart", compact('totalReservationsPerMonth', 'totalPricePerMonth','totalRegisrationsPerMonth','percentageByType'));
    }
}

