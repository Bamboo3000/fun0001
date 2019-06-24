<?php namespace Sative\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSativeFormForm extends Migration
{
    public function up()
    {
        Schema::table('sative_form_form', function($table)
        {
            $table->text('name')->nullable(false)->unsigned(false)->default(null)->change();
            $table->text('phone')->nullable(false)->unsigned(false)->default(null)->change();
            $table->text('email')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('sative_form_form', function($table)
        {
            $table->string('name', 191)->nullable(false)->unsigned(false)->default(null)->change();
            $table->string('phone', 191)->nullable(false)->unsigned(false)->default(null)->change();
            $table->string('email', 191)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
