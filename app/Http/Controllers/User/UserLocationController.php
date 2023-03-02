<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;
use Location;
use Auth;
// use Illuminate\Support\Facades\Auth;
// use Stevebauman\Location\Facades\Location;


class UserLocationController extends Controller
{
    public function GetVisitorDetails(Request $request){

        $ip = "77.232.122.208"; 
        // $ip = request()->ip();
        $userLocation = Location::get($ip);
        date_default_timezone_set("Asia/Riyadh");
        $visit_time = date("h:i:sa");
        $visit_date = date("d-m-Y");

        $result = Visitor::insert([
            'ip_address'    => $ip,
            'country'       => $userLocation->countryName,
            'city'          => $userLocation->cityName,
            'user_id'       => $request->user_id,
            'page'          => $request->page,
            'username'      => $request->username,
            'region_name'   => $userLocation->regionName,
            'zip_code'      => $userLocation->zipCode,
            'postal_code'   => $userLocation->postalCode,
            'time_zone'     => $userLocation->timezone,
            'visit_time'    => $visit_time,
            'visit_date'    => $visit_date,
        ]);


        return $result;
    } //end method


}
