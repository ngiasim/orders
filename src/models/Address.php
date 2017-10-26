<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
	use SoftDeletes;
    protected $table = 'address';
    protected $primaryKey = "address_id";


    protected $fillable = ['first_name','last_name','email','line1','line2','line3','city','state','fk_customer','fk_language','fk_country'];


    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'fk_country', 'country_id');
    }

     protected function warehouseRules($except_id=""){
        $arr =  array(
            'line1'              => 'required|max:20',
            'line2'              => 'max:20',   
            'line3'              => 'max:20',               
            'city'               => 'required|max:20',
            'state'              => 'max:20',
            'fk_country'         => 'required', 
                 
        );
        return $arr;
    }

    protected function addWarehouseAddress($request){

        $this->fill([
                'first_name'        => 'customer1',
                'last_name'         => 'customer1',
                'email'             => 'customer1@test.com',
                'line1'        		=> $request['line1'],
                'line2'         	=> $request['line2'],
                'line3'             => $request['line3'],
                'city'              => $request['city'],
                'state'             => $request['state'],
                'fk_customer'      	=> 1,
                'fk_language'       => 1,
                'fk_country'        => $request['fk_country']
            ]);

        $this->save();
        return $this->address_id;
    }

    protected function updateWarehouseAddress($request,$id){

        $address = $this->find($id);
        $address->line1             = $request['line1'];
        $address->line2             = $request['line2'];
        $address->line3     		= $request['line3'];
        $address->city      		= $request['city'];
        $address->state             = $request['state'];
        $address->fk_country        = $request['fk_country'];
        $address->save();
        
    }


}
