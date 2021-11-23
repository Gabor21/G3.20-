<?php
    class Conectar
    {
        Protected $bdh;
        Protected function conexion()
        {
            try
            {
                $conectar = $this->bdh = new PDO("mysql:host=34.68.196.220;dbname=g3_20","G3_20","tfc4C852");
                return $conectar;
            }
            catch(Exception $e)
            {
                print "¡Error BD!:" .$e->get_message(). "<br/>";
                die();

            }

        }
        public function set_names()
        {
            return $this->bdh->query("SET NAMES 'utf8'");
        }

    }   



?>
