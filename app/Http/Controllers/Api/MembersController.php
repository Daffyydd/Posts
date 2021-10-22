<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Request;
use Orion\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Str;

class MembersController extends Controller
{
   
    protected $model = Member::class;

    protected function beforeStore(Request $request, $member)
    {
          $sno = Member::max('sno');
          $memberNumber ='Q-'.Str::padLeft($sno+1, 6,'0');
          $member->sno=$sno+1;
          $member->member_no=$memberNumber;
          $member->member_status='Active';
    } 

    /**
     * @return array
     */
    protected function includes() : array
    {
       return ['dependants.*'];
    }

}