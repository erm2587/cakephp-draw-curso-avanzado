<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'avanzado',
	);

        public $test = array(
                'datasource' => 'Database/Mysql',
                'persistent' => false,
                'host' => 'localhost',
                'login' => 'root',
                'password' => 'root',
                'database' => 'avanzado_test',
        );

}
