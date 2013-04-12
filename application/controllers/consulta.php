<?php

class Consulta extends CI_Controller
    {
    	function __construct(){
    		parent::__construct();
    		//$this->_is_logued_in();
    		$this->load->model('usuarios_model');
    		$this->load->library('My_PHPMailer');
    		$this->load->helper(array('form', 'url'));
    		//$this->load->model('policia_model');
    		$this->load->model('consulta_model');
			//$this->load->library('email');
			$this->load->library('form_validation');
			$this->load->helper('date'); 
    	}
		function _is_logued_in()
		{
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('usuarios');
			}	
		}
		function index()
		{
			
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('inicio');
			}	
			else{
				/*$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_pol');
                $dato ['policia'] =$this->policia_model->selec_policia($id);  
				$dato['tipo_user'] = $this->session->userdata('tipo_user');*/
								
				$dato['title']= "Pagina de Socios";	

			//	$dato['consulta'] = $this->horario_model->selec_horario();	
			
				$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/bienvenidos");
				$this->load->view("socios/pie");
			}
			
		}
		
		function lista_consulta()
		{
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('inicio');
			}	
			else{

				$dato['title']= "Lista de Consultas";	

				if($dato['filas'] = $this->consulta_model->selec_consultas())
				{

					$this->load->view("socios/cabecera",$dato);
					//$this->load->view("inicio/$menu",$dato);
					$this->load->view("socios/lista_consultas");
					$this->load->view("socios/pie");
				}
				else
				{

					$this->load->view("socios/cabecera",$dato);
					//$this->load->view("inicio/$menu",$dato);
					$this->load->view("socios/no_consultas");
					$this->load->view("socios/pie");	
				}	
			}

		}
		function registrar_consulta()
		{


			$this->form_validation->set_rules('nombre', 'NOMBRE', 'required|trim|min_length[3]|strtoupper');
			$this->form_validation->set_rules('email', 'EMAIL', 'required|trim|min_length[3]|valid_email');
			$this->form_validation->set_rules('comentario', 'COMENTARIO', 'required|trim|min_length[3]');
			
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('valid_email', 'La direccion de correo es incorrecta ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				redirect("inicio");
				//$this->registrar_tipi();
				//echo "error";
			}
			else
			{
				$datestring = " %Y-%m-%d";
				$time = time();
				$fecha =  mdate($datestring, $time);

				$ultimo = $this->consulta_model->ultimid();
					$id_ult = $ultimo[0]->id_con;
					$id_ult = $id_ult + 1;

				$nombre = $this->input->post ('nombre');
				$email = $this->input->post ('email'); 
				$comentario = $this->input->post ('comentario');

				$contenido = "$comentario <br /> REPONDER -> http://siesrl.260mb.org/index.php/consulta/reponder_consulta_correo/$id_ult/1";
				//$contenido = $comentario;	

			/*		
				$mail = new PHPMailer();
			        $mail->IsSMTP(); // establecemos que utilizaremos SMTP
			      	$mail->SMTPAuth   = true; // habilitamos la autenticación SMTP
			        $mail->SMTPSecure = "ssl";  // establecemos el prefijo del protocolo seguro de comunicación con el servidor
			        $mail->Host       = "smtp.gmail.com";      // establecemos GMail como nuestro servidor SMTP
			        $mail->Port       = 465;                   // establecemos el puerto SMTP en el servidor de GMail
			        $mail->Username   = "sieboliva@gmail.com";  // la cuenta de correo GMail
			        $mail->Password   = "siebolivia2012";            // password de la cuenta GMail
			        $mail->SetFrom('sieboliva@gmail.com', 'S.I.E. SRL');  //Quien envía el correo
			        $mail->AddReplyTo("alvarod745@gmail.com","Nombre Apellido");  //A quien debe ir dirigida la respuesta
			        $mail->Subject    = "NUEVA CONSULTA";  //Asunto del mensaje
			        $mail->Body      = "$contenido	 ";
			        $mail->AltBody    = "Cuerpo en texto plano";
			       //$destino = ('roger.mendez.r@gmail.com, fr2percy@gmail.com,iverherlandth@gmail.com,alvarod745@gmail.com,rafa_rolando@hotmail.com');

			        $destino = "alvarod745@gmail.com";
			        $mail->AddAddress("roger.mendez.r@gmail.com");

			      //  $mail->AddAttachment("images/phpmailer.gif");      // añadimos archivos adjuntos si es necesario
			        //$mail->AddAttachment("images/phpmailer_mini.gif"); // tantos como queramos

			        if(!$mail->Send()) {
			        	echo "error no se envio ";
			            //$data["message"] = "Error en el envío: " . $mail->ErrorInfo;
			        } */

				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'smtp.googlemail.com';
				$config['smtp_port'] = 587;
				$config['smtp_user'] = 'sieboliva@gmail.com';
				$config['smtp_pass'] = 'siebolivia2012';
				$config['type'] = 'html';

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");


				$this->email->from($email);
				//$this->email->to('alvarod745@gmail.com,roger.mendez.r@gmail.com, fr2percy@gmail.com,iverherlandth@gmail.com,rafa_rolando@hotmail.com');
				$this->email->to('alvarod745@gmail.com');
				//$this->email->subject('Aquí está su información ');
				$this->email->subject('NUEVA CONSULTA');
				$this->email->message("$comentario  REPONDER -> http://localhost:8080/SIE/index.php/consulta/respuesta_correo/$id_ult");
				$this->email->send();

				if ( ! $this->email->send())
				{
				 echo "no se envio su consulta jajajaj";
				}
			        else { 
							//
					$insert = $this->consulta_model->registrar_consulta($email,$nombre,$comentario,$fecha);
					Redirect("inicio");
				
				}	
				
				
			}

		}
		
		

		function respuesta_correo($id_cons)
		{

				$dato['id_con'] = $id_cons;


				$dato['title']= "Iniciar session";
				$dato['error']= "";	
				
				//$dato['filas'] = $this->consulta_model->selec_consultas_id($id_cons);	
				
				//$insert = $this->consulta_model->actu_leido($id_cons);

				$this->load->view("socios/seccion_correo",$dato);
				

		}



		function respuesta_consulta($id_cons)
		{
			
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('inicio');
			}	
			else{

				$dato['id_user'] = $this->session->userdata('id_user');
				$dato['title']= "Responder Consulta";	

				$dato['filas'] = $this->consulta_model->selec_consultas_id($id_cons);	
				$insert = $this->consulta_model->actu_leido($id_cons);
				$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/responder_consultas");
				$this->load->view("socios/pie");
			}
		}



		function reponder_consulta_correo($id_cons)
		{
			if($this->consulta_model->repondi_con($id_cons))
			{
				redirect('inicio');
			}	
			else
			{	
				$dato['title']= "Responder Consulta";	
			//	$dato['id_user'] = $id_user;
				$dato['filas'] = $this->consulta_model->selec_consultas_id($id_cons);	
				$insert = $this->consulta_model->actu_leido($id_cons);
				$this->load->view("socios/cabecera",$dato);
				//$this->load->view("inicio/$menu",$dato);
				$this->load->view("socios/responder_consultas");
				$this->load->view("socios/pie");
			}
		}

		function registrar_respuesta($id_con)
		{
			$this->form_validation->set_rules('respuesta', 'RESPUESTA', 'required|trim|min_length[3]');
		
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			//$this->form_validation->set_message('valid_email', 'La direccion de correo es incorrecta ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener 3 caracteres ...!!!!!');
			
			if (($this->form_validation->run()) == FALSE)
			{
				//redirect("inicio");
				$this->respuesta_consulta($id_con);
				//echo "error";
			}
			else
			{
				$filas = $this->consulta_model->selec_consultas_id($id_con);	
				$email = $filas[0]->email;

				$datestring = " %Y-%m-%d";
				$time = time();
				$fecha =  mdate($datestring, $time);

				

				$comentario = $this->input->post ('respuesta');


				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'smtp.googlemail.com';
				$config['smtp_port'] = 587;
				$config['smtp_user'] = 'sieboliva@gmail.com';
				$config['smtp_pass'] = 'siebolivia2012';

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");


				$this->email->from('sieboliva@gmail.com');
				$this->email->to($email);
				
				//$this->email->subject('Aquí está su información ');
				$this->email->subject('SU RESPUESTA.. A SU CONSULTA');
				$this->email->message($comentario);
				//$this->email->send();


				if ( ! $this->email->send())
				{
				 echo "no se envio la cagada jajajaj";
				}
				else
				{ 
					$id_user = $this->session->userdata('id_user');
					$insert = $this->consulta_model->registrar_respuest($id_user,$id_con,$fecha,$comentario);
					$this->index();
				}
			}
		}
		function inicio_session($id_con)
		{
			$username = $this->input->post('user'); 
			$password = md5($this->input->post('pass'));
			$login = $this->usuarios_model->loguear($username, $password);
				//echo $password;
				
			if($login)
			{
				
				

				
				$data = array(
					'is_logued_in'  => TRUE,
					'id_user' => $login[0]->id_user,
					/*'tipo_user' => $login[0]->tipo_user,
					'id_pol' => $login[0]->id_pol,
					'estado' => $login[0]->estado_user,*/
					'user' => $login[0]->username
								
					
				);

				
					$this->session->set_userdata($data);
					//redirect("socios");
					$this->reponder_consulta_correo($id_con);
				//echo "esta bien";

			}
			else 
			{
				
				$dato['error'] ="El nombre de usuario o contraseña son incorrectos";	
				

				$dato['id_con'] = $id_con;


				$dato['title']= "Iniciar session";
			
				
				//$dato['filas'] = $this->consulta_model->selec_consultas_id($id_con);	
				
				

				$this->load->view("socios/seccion_correo",$dato);
			}

		}

		
		
}
?>