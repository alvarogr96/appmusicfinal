<?php 
namespace Fuel\Migrations;

class Privacidad
{

    function up()
    {
        \DBUtil::create_table('privacidad', array(
            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'perfil' => array('type' => 'varchar', 'constraint' => 100),
            'amigos' => array('type' => 'varchar', 'constraint' => 100),
            'listas' => array('type' => 'varchar', 'constraint' => 100),
            'notificaciones' => array('type' => 'varchar', 'constraint' => 100),
            'localizacion' => array('type' => 'varchar', 'constraint' => 100),
            
        ), array('id'));
    }

    function down()
    {
       \DBUtil::drop_table('privacidad');
    }
}