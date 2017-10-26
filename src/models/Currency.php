<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
	//use SoftDeletes;
    protected $table = 'currency';
    protected $primaryKey = "currency_id";

     public function CheckCurrency($currency_name)
     {
        $row = Currency::where("name","=",$currency_name)->get();
        return $row;
     }

     public function CurrencyFormatting($CurrencyCode,$Amount)
     {
        $format = Currency::where("code","=",$CurrencyCode)->get();
        return number_format($Amount, $format[0]->decimal_places, $format[0]->decimal_point, $format[0]->thousand_point); // 1,234.56

     }

     public function Conversion($from_rate, $to_rate, $price)
     {
       //dd($to_rate);
      if(($from_rate != 0.00 || $from_rate != 0 || $from_rate != '') && ($to_rate != 0.00 || $to_rate != 0 || $to_rate != '') && ($price != 0.00 || $price != 0 || $price != ''))
      {
        return round($price/$from_rate*$to_rate, 2);
      }
      else
      {
        return 0.00;
      }
     }

    public function getCurrencybyCountrycode($countrycode)
    {

      $result = Currency::join("country","fk_currency_display","currency_id")
      ->where("code","=",$countrycode)->get();
      return  $result;

      // $query = "select c.display_currency, curr.symbol from
      //       countries c
      //       left join currency curr
      //        on c.display_currency = curr.name
      //       where c.country_code = '".$countrycode."'";

    }

}
