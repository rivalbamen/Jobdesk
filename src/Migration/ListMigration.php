<?php
namespace App\Migration;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class ListMigration
{
	public function createTable()
	{
		if(!Capsule::schema()->hasTable('lists')) {
			Capsule::schema()->create('lists', function(Blueprint $table)
				{
					$table->increments('id_list');
					$table->integer('id_board');
					$table->string('name_list', 50);
					$table->timestamps();
					$table->softDeletes();
				});
		}
	}
}