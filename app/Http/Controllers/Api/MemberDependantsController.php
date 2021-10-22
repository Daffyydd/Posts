<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\Member;
use Orion\Concerns\DisableAuthorization;

class MemberDependantsController extends RelationController
{
      use DisableAuthorization;
      protected $model = Member::class;

      protected $relation = 'dependants';
}