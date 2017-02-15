<?php
namespace App\Migration;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CardMigration
{
	public function createTable()
	{
		if(!Capsule::schema()->hasTable('cards')) {
			Capsule::schema()->create('cards', function(Blueprint $table)
				{
					$table->increments('id_card');
					$table->integer('id_list');
					$table->string('name_card', 50);
					$table->timestamps();
					$table->softDeletes();
				});
		}
	}
}