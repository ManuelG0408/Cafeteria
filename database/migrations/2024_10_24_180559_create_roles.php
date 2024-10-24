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
        $role1 = Role::create(['name'=> 'admin']);
        $role2 = Role::create(['name'=> 'cliente']);
        $user = User::find(1);
        $user->assignRole($role1);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
