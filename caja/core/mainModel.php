<?php

    if($peticion){
        require_once "../core/configApp.php";
    }else{
        require_once "./configApp.php";
    }

    class MainModel{

        protected function connection(){

            $connection = odbc_connect(SGBD, USER, PASS);
            return $connection;

        }

        protected function executeQuery($query){

            $execute = odbc_exec(self::connection(),$query);
            return $execute;
        }

        protected function agregarCuenta($data){

            $connect = self::connection();
         
        }

        public function encryption($string){

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
        }
        
		protected function decryption($string){

			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

        protected function randomNumber($letter, $lenght,$number){

            for($i=1; $i<=$lenght; $i++){
                $number = rand(0,9);
                $letter.= $number;
            }

            return $letter."-".$number;
        }

        protected function clearString($string){
            
            $string = trim($string);
            $string = stripslashes($string);
            $string = str_ireplace("<script>", "", $string);
            $string = str_ireplace("</script>", "", $string);
            $string = str_ireplace("<script src", "", $string);
            $string = str_ireplace("<script type=", "", $string);
            $string = str_ireplace("SELECT * FROM", "", $string);
            $string = str_ireplace("DELETE  FROM", "", $string);
            $string = str_ireplace("INSERT INTO", "", $string);
            $string = str_ireplace("--", "", $string);
            $string = str_ireplace("==", "", $string);
            $string = str_ireplace("{", "", $string);
            $string = str_ireplace("}", "", $string);
            $string = str_ireplace("[", "", $string);
            $string = str_ireplace("]", "", $string);

            return $string;
        }

        public function alerts($data){

            if($data['Alert'] == "simple"){

                $message = "<script>

                    swal(
                        '".$data['Title']."',
                        '".$data['Text']."',
                        '".$data['Type']."'
                    );

                </script>";

            }elseif($data['Alert'] == "reload"){
                
                $message = "<script>

                    swal({
                        title: '".$data['Title']."',
                        text: '".$data['Text']."',
                        type: '".$data['Type']."',
                  
                        confirmButtonText: 'Aceptar'
                    }).then(function() {
                        location.reload();
                    });

                </script>";

            }elseif($data['Alert'] == "clear"){

                 
                $message = "<script>

                    swal({
                        title: '".$data['Title']."',
                        text: '".$data['Text']."',
                        type: '".$data['Type']."',
                  
                        confirmButtonText: 'Aceptar'
                    }).then(function() {
                        
                        $('.FormularioAjax')[0].reset();
                    });

                </script>";
                
            }

            return $message;
        }

    }


?>