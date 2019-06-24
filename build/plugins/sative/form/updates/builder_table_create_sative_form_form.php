<?php namespace Sative\Form\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSativeFormForm extends Migration
{
    public function up()
    {
        Schema::create('sative_form_form', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('money')->nullable();
            $table->text('description')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('agree')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sative_form_form');
    }
}
