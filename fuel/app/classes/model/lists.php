<?php 
class Model_Lists extends Orm\Model
{
    protected static $_table_name = 'lists';
    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id',
        'title' => array(
            'data_type' => 'varchar'   
        ),
        'editable' => array(
            'data_type' => 'int'   
        ),
        'image_profile' => array(
            'data_type' => 'varchar'   
        ),
        'id_user',
    );
   protected static $_belongs_to = array(
        'users' => array(
            'key_from' => 'id_user',
            'model_to' => 'Model_Users',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        )
    );
}