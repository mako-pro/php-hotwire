<?php

namespace app\migrations;

use mako\database\migrations\Migration;

class Migration_20230429081442 extends Migration
{
	/**
	 * Description.
	 *
	 * @var string
	 */
	protected $description = 'Create tasks table';

	/**
	 * Makes changes to the database structure.
	 */
	public function up(): void
	{
		$this->getConnection()->query
		(<<<SQL
			CREATE TABLE `tasks` (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				`due_date` datetime DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
		SQL);
	}

	/**
	 * Reverts the database changes.
	 */
	public function down(): void
	{
		$this->getConnection()->query
		(<<<SQL
			DROP TABLE IF EXISTS `tasks`;
		SQL);
	}

}
