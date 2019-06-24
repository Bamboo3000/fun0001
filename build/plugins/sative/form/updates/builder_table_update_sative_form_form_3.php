<?php namespace Sative\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSativeFormForm3 extends Migration
{
    public function up()
    {
        Schema::table('sative_form_form', function($table)
        {
            $table->string('money', 255)->change();
        });
    }
    
    public function down()
    {
        Schema::table('sative_form_form', function($table)
        {
            $table->string('money', 191)->change();
        });
    }
}
