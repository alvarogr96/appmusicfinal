<?php

use Firebase\JWT\JWT;

class Controller_Roles extends Controller_Rest
{

	private $key = "dejr334irj3irji3r4j3rji3jiSj3jri";

	public function post_create()
    {
    	try {
            
            if ( empty($_POST['type']))
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' =>  'Falta algun campo'
                ));
                return $json;            }

            $role = $_POST['type'];

            if($this->isRoleCreated($role))
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'El rol existe',
                    'data' => []
                ));
                return $json;
            }

            $input = $_POST;
            $role = new Model_Roles();
            $role->type = $input['type'];
            $role->save();
            
            $dataToken = array(
                        "type" => $role,
                        
                    );

                    $token = JWT::encode($dataToken, $this->$key);
                    
            $json = $this->response(array(
                'code' => 200,
                'message' => 'Rol creado',
                'data' => []
            ));
            return $json;
        } 
        catch (Exception $e) 
        {
            $json = $this->response(array(
                'code' => 500,
                'message' => $e->getMessage()
            ));
            return $json;
        }
    }
     public function get_roles()
    {
        /*return $this->respuesta(500, 'trace');
        exit;*/
        $roles = Model_Roles::find('all');
        return $this->response(Arr::reindex($roles));
    }

        public function isRolesCreated($type)
    {
        $roles = Model_Roles::find('all', array(
            'where' => array(
                array('type', $type)
            )
        ));
        
        if(count($type) < 1)  {
            return false;
        }
        else 
        {
            return true;
        }
    }

}