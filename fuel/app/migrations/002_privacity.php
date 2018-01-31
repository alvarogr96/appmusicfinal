<?php 
namespace Fuel\Migrations;

class Privacity
{

    function up()
    {
        \DBUtil::create_table('privacity', array(
            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'profile' => array('type' => 'varchar', 'constraint' => 100),
            'friends' => array('type' => 'varchar', 'constraint' => 100),
            'lists' => array('type' => 'varchar', 'constraint' => 100),
            'notifications' => array('type' => 'varchar', 'constraint' => 100),
            'localization' => array('type' => 'varchar', 'constraint' => 100),
            
        ), array('id'));
    }

    function down()
    {
       \DBUtil::drop_table('privacity');
    }
}