<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompletedatasetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('completedataset', function(Blueprint $table)
		{
			$table->integer('Index')->nullable();
			$table->text('Name', 65535)->nullable();
			$table->integer('Age')->nullable();
			$table->text('Photo', 65535)->nullable();
			$table->text('Nationality', 65535)->nullable();
			$table->text('Flag', 65535)->nullable();
			$table->integer('Overall')->nullable();
			$table->integer('Potential')->nullable();
			$table->text('Club', 65535)->nullable();
			$table->text('ClubLogo', 65535)->nullable();
			$table->text('Value', 65535)->nullable();
			$table->text('Wage', 65535)->nullable();
			$table->integer('Special')->nullable();
			$table->integer('Acceleration')->nullable();
			$table->integer('Aggression')->nullable();
			$table->integer('Agility')->nullable();
			$table->integer('Balance')->nullable();
			$table->integer('Ballcontrol')->nullable();
			$table->integer('Composure')->nullable();
			$table->integer('Crossing')->nullable();
			$table->integer('Curve')->nullable();
			$table->integer('Dribbling')->nullable();
			$table->integer('Finishing')->nullable();
			$table->integer('Freekickaccuracy')->nullable();
			$table->integer('GKdiving')->nullable();
			$table->integer('GKhandling')->nullable();
			$table->integer('GKkicking')->nullable();
			$table->integer('GKpositioning')->nullable();
			$table->integer('GKreflexes')->nullable();
			$table->integer('Headingaccuracy')->nullable();
			$table->integer('ID')->nullable();
			$table->integer('Interceptions')->nullable();
			$table->integer('Jumping')->nullable();
			$table->integer('Longpassing')->nullable();
			$table->integer('Longshots')->nullable();
			$table->integer('Marking')->nullable();
			$table->integer('Penalties')->nullable();
			$table->integer('Positioning')->nullable();
			$table->integer('Reactions')->nullable();
			$table->integer('Shortpassing')->nullable();
			$table->integer('Shotpower')->nullable();
			$table->integer('Slidingtackle')->nullable();
			$table->integer('Sprintspeed')->nullable();
			$table->integer('Stamina')->nullable();
			$table->integer('Standingtackle')->nullable();
			$table->integer('Strength')->nullable();
			$table->integer('Vision')->nullable();
			$table->integer('Volleys')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('completedataset');
	}

}
