<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_info', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('email');
            $table->string('website')->nullable();
            $table->binary('logo')->nullable();
            $table->string('logo_filename')->nullable();
            $table->string('logo_mimetype')->nullable();
            $table->string('logo_charset')->nullable();
            $table->timestamp('logo_lastupd',$precision = 0)->nullable();
            $table->timestamps();
        });

        Schema::create('salutations', function (Blueprint $table) {
              $table->id();
              $table->string('salutation_name');
              $table->timestamps();
        });
        Schema::create('relationships', function (Blueprint $table) {
              $table->id();
              $table->string('relationship_name');
              $table->timestamps();
        });
       
       Schema::create('periods', function (Blueprint $table) {
              $table->id();
              $table->string('period_name');
              $table->integer('period_number')->default(1);
              $table->date('start_date');
              $table->date('end_date')->nullable();
              $table->string('closed')->default('N');
              $table->timestamps();
        });
        Schema::create('reciept_types', function (Blueprint $table) {
              $table->id();
              $table->string('receipt_name');
              $table->string('ledger_name');             
              $table->timestamps();
        });
        Schema::create('payment_modes', function (Blueprint $table) {
              $table->id();
              $table->string('payment_mode_name');
              $table->string('ledger_type');             
              $table->timestamps();
        });
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salutation_id')->constrained();
            $table->string('member_no')->unique();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('email');
            $table->date('joining_date')->nullable();
            $table->enum('gender',['Male','Female','Other']);
            $table->enum('id_type',['Passport','National ID','Other'])->nullable();
            $table->string('id_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('nok_name')->nullable();
            $table->string('nok_contact')->nullable();
            $table->string('member_status')->nullable();
            $table->integer('sno');
            $table->timestamps();
        });
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained();   
            $table->string('firstname');           
            $table->string('lastname');
            $table->foreignId('relationship_id')->constrained();
            $table->integer('percentage');           
            $table->timestamps();
        });
        Schema::create('dependants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained();   
            $table->string('firstname');           
            $table->string('lastname');
            $table->foreignId('relationship_id')->constrained();
            $table->enum('gender',['Male','Female','Other']);
            $table->enum('category',['IMMEDIATE FAMILY','PARENTS','SIBLINGS'])->nullable();                       
            $table->timestamps();
        });

        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained();  
            $table->foreignId('period_id')->constrained(); 
            $table->foreignId('payment_mode_id')->constrained(); 
            $table->date('transaction_date');           
            $table->foreignId('receipt_type_id')->constrained();
            $table->integer('legder')->nullable();
            $table->string('trans_ref')->nullable();
            $table->double('transaction_amount');
            $table->text('description')->nullable();           
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_info');
        Schema::dropIfExists('salutations');
        Schema::dropIfExists('relationships');
        Schema::dropIfExists('periods');
        Schema::dropIfExists('reciept_types');
        Schema::dropIfExists('payment_modes');
        Schema::dropIfExists('beneficiaries');
        Schema::dropIfExists('dependants');
        Schema::dropIfExists('contributions');
    }
}