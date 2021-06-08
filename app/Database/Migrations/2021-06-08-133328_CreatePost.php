<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePost extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=> [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'UserId'=> [
				'type'       => 'INT',
				'constraint' => 5,
			],
			'Title'=> [
				'type'       => 'TEXT',
				'null' 		 => true,
			],
			'body'=> [
				'type'       => 'TEXT',
				'null' 		 => true,
			],
			'gambar'=> [
				'type'       => 'TEXT',
				'null' 		 => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('posts');
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
