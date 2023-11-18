<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cms_inputs', function (Blueprint $table) {
            $table->id();
            $table->enum('type_input',
                [
                    'text',
                    'textarea',
                    'number',
                    'phone',
                    'email',
                    'password',
                    'address',
                    'select',
                    'date',
                    'datetime-local',
                    'range',
                    'radio',
                    'checkbox',
                    'search',
                    'file',
                    'tel',
                    'url',
                    'color'
                ])->default('text');
            $table->string('_name')->nullable();
            $table->string('_title')->nullable();
            $table->string('_label')->nullable();
            $table->string('_class')->nullable();
            $table->string('_id')->nullable();
            $table->boolean('is_required')->default(false);
            $table->text('rules')->nullable();
            $table->text('messages')->nullable();
            $table->string('icon')->nullable();
            $table->string('tooltip')->nullable();
            $table->string('_placeholder')->nullable();

            $table->unsignedBigInteger('cms_id');
            $table->foreign('cms_id')->references('id')->on('cms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_inputs');
    }
};
