<?php 
namespace Fuel\Migrations;
class Users
{
    function up()
    {
        \DBUtil::create_table('users', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'username' => array('type' => 'varchar', 'constraint' => 100),
            'email' => array('type' => 'varchar', 'constraint' => 100),
            'password' => array('type' => 'varchar', 'constraint' => 100),
            'id_device' => array('type' => 'varchar', 'constraint' => 100),
            'image_profile' => array('type' => 'varchar', 'constraint' => 100),
            'x' => array('type' => 'decimal', 'constraint' => 30),
            'y' => array('type' => 'decimal', 'constraint' => 30),
            'birthday' => array('type' => 'varchar', 'constraint' => 100),
            'city' => array('type' => 'varchar', 'constraint' => 100),
            'description' => array('type' => 'varchar', 'constraint' => 100),
            'id_rol' => array('type' => 'int', 'constraint' => 11),
            'id_privacity' => array('type' => 'int', 'constraint' => 11),
        ), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
		    array(
		        array(
		            'constraint' => 'foreignKeyFromUsersToRoles',
		            'key' => 'id_rol',
		            'reference' => array(
		                'table' => 'roles',
		                'column' => 'id',
		            ),
		            'on_update' => 'CASCADE',
		            'on_delete' => 'RESTRICT'
		        ),
		        array(
		            'constraint' => 'foreignKeyFromUsersToPrivacity',
		            'key' => 'id_privacity',
		            'reference' => array(
		                'table' => 'privacity',
		                'column' => 'id',
		            ),
		            'on_update' => 'CASCADE',
		            'on_delete' => 'RESTRICT'
		        )
		    )
		);
    }
    function down()
    {
       \DBUtil::drop_table('users');
    }
}