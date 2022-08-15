<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = Config::get('logging.channels.database.connection', Config::get('database.default'));
        $model = Config::get('logging.channels.database.model', 'logs');

        Schema::connection($connection)::create(
            $model,
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('instance')->index();
                $table->string('channel')->index();
                $table->string('level')->index();
                $table->string('level_name');
                $table->longText('message');
                $table->longText('context');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = Config::get('logging.channels.database.connection', Config::get('database.default'));
        $model = Config::get('logging.channels.database.model', 'logs');

        Schema::connection($connection)->drop($model);
    }
}