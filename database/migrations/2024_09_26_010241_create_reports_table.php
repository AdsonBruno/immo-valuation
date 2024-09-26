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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('purpose', [
                'Financiamento bancário',
                'Processos judiciais',
                'Compra de imóveis',
                'Venda de imóveis',
                'Divisão de herança',
                'outros'
            ]);
            $table->string('other_purpose')->nullable();
            $table->string('interested');
            $table->enum('interested_type', ['cpf', 'cnpj']);
            $table->string('document_number_interested_party');
            $table->string('property_owner');
            $table->string('owner_document');
            $table->string('registration_number');
            $table->string('city_hall_license_number')->nullable();
            $table->text('property_description')->nullable();
            $table->string('property_location');
            $table->float('total_area');
            $table->float('constructed_area');
            $table->integer('floors_quantity')->default(1);
            $table->json('floors_details')->nullable();
            $table->enum('condition', ['good', 'bad', 'excelent']);
            $table->enum('context', ['urban', 'rural']);
            $table->string('methodology');
            $table->date('inspection_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
