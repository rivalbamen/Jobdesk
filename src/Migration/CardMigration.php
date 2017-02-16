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
					$table->increments('id');
					$table->integer('list');
					$table->string('cardname', 50);
					$table->timestamps();
					$table->softDeletes();
				});
		}
	}
}