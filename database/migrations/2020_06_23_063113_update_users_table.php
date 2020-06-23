<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('social', ['google', 'facebook'])->nullable()->after('email_verified_at');
            $table->string('social_id')->nullable()->after('social');
            $table->string('avatar')->nullable()->after('social_id');
            $table->char('whatsapp', 15)->nullable()->unique()->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('social');
            $table->dropColumn('social_id');
            $table->dropColumn('avatar');
            $table->dropColumn('whatsapp');
        });
    }
}
