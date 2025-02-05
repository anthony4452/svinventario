<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("Producto");
		$this->load->helper("form");
    }
	public function index()
	{
		$this->load->view('head');
		$resultado = $this->load->Producto->contarProd();
		$data = array(
            "mensaje1" => $resultado['menor3'],
            "mensaje2" => $resultado['cero']
        );

		$prod["productos"]=$this->Producto->leerProd();
		$this->load->view('buscar');
		$this->load->view('notificacion', $data);
		$this->load->view('tablas', $prod);
	}

	public function agregarProd(){
		$identificador = $this->input->post('identificador');
		$cantidad = $this->input->post('cant');
		$cantidadAnterior = $this->input->post('suma');
		$total = $cantidadAnterior + $cantidad;
		$this->Producto->sumar($identificador, $total);
			if ($total <= 3){
				$this->enviarEmail();
			}
		redirect("Productos");
	}
	public function restarProd(){
		$identificador = $this->input->post('ident');
		$cantidad = $this->input->post('canti');
		$cantidadAnterior = $this->input->post('can');
		if ($cantidadAnterior - $cantidad < 0) {
			?>
			<script>
				alert("La cantidad ingresada da un número negativo.");
				window.location.href = "<?php echo site_url('Productos'); ?>";
			</script>
			<?php
			exit;
		} else {
			$total = $cantidadAnterior - $cantidad;
			$this->Producto->restar($identificador, $total);
			if ($total <= 3){
				$this->enviarEmail();
			}
			redirect('Productos');
		}
	}

	public function agregar(){
		$imagenOculta = $this->input->post('imagen_actual');
		$id = $this->input->post('serial');
		$image = $_FILES['imagen']['tmp_name'];
		$nombreImagen1 = $_FILES['imagen']['name'];
		$nombreImagen = str_replace(' ', '', $nombreImagen1);
		echo "$nombreImagen";
		$tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
		$sizeImagen = $_FILES['imagen']['size'];
		$directorio = 'img/';
		$ruta_eliminar_img = FCPATH . str_replace('/', DIRECTORY_SEPARATOR, $imagenOculta);
		if (!$imagenOculta == true) { // Es un nuevo equipo a registrar
			if ($tipoImagen == 'jpg' || $tipoImagen == 'png' || $tipoImagen == 'jpeg') {
				$ruta = $directorio.$nombreImagen;
				$data = [
					'nombre' => $this->input->post('nombre'),
					'marca' => $this->input->post('marca'),
					'descripcion' => $this->input->post('descripcion'),
					'cantidad' => $this->input->post('cantidad'),
					'tipo' => $this->input->post('tipo'),
					'imagen' => $ruta
				];
				//almacenamiento de la imagen
				$bandera = $this->Producto->existeImg($ruta);
				if ($bandera == false) {
					if(move_uploaded_file($image, $ruta)){
						?>
						<script>
							alert("Exito al guardar la imagen.");
							window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
						</script>
						<?php
					}else{
						?>
						<script>
							alert("Error al guardar la imagen.");
							window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
						</script>
						<?php
						exit;
					}
				}
			} else {
				?>
				<script>
					alert("No se admite ese tipo de archivo.");
					window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
				</script>
				<?php
				exit;
			}
		} else { // Quiere decir que entra a editar un equipo
			if (!$nombreImagen) { // Si no se ha registrado ninguna imagen
				if ($tipoImagen == 'jpg' || $tipoImagen == 'png' || $tipoImagen == 'jpeg' || $tipoImagen == '') {
					$data = [
						'nombre' => $this->input->post('nombre'),
						'marca' => $this->input->post('marca'),
						'descripcion' => $this->input->post('descripcion'),
						'cantidad' => $this->input->post('cantidad'),
						'tipo' => $this->input->post('tipo'),
						'imagen' => $imagenOculta
					];
					//no es necesario bloque de codigo de almacenamiento de imagen porque no esta cambiando imagen
				} else {
					?>
					<script>
						alert("No se admite ese tipo de archivo.");
						window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
					</script>
					<?php
					exit;
				}
			} else { // Si se ha registrado una nueva imagen
				if ($tipoImagen == 'jpg' || $tipoImagen == 'png' || $tipoImagen == 'jpeg') {
					$ruta = $directorio.$nombreImagen;
					$data = [
						'nombre' => $this->input->post('nombre'),
						'marca' => $this->input->post('marca'),
						'descripcion' => $this->input->post('descripcion'),
						'cantidad' => $this->input->post('cantidad'),
						'tipo' => $this->input->post('tipo'),
						'imagen' => $ruta
					];
					//almacenamiento de la imagen
					$num = $this->Producto->existeImg($imagenOculta);
					if ($num == 0) {
						if(move_uploaded_file($image, $ruta)){
							?>
							<script>
								alert("Exito al guardar la imagen.");
								window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
							</script>
							<?php
						}else{
							?>
							<script>
								alert("Error al guardar la imagen.");
								window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
							</script>
							<?php
							exit;
						}
					}elseif ($num == 1){ // aqui eliminar imagen
						unlink($ruta_eliminar_img); // Eliminar la imagen anterior
						if(move_uploaded_file($image, $ruta)){
							?>
							<script>
								alert("Exito al guardar la imagen.");
								window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
							</script>
							<?php
						}else{
							?>
							<script>
								alert("Error al guardar la imagen.");
								window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
							</script>
							<?php
							exit;
						}
					}else{
						if(move_uploaded_file($image, $ruta)){
							?>
							<script>
								alert("Exito al guardar la imagen.");
								window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
							</script>
							<?php
						}else{
							?>
							<script>
								alert("Error al guardar la imagen.");
								window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
							</script>
							<?php
							exit;
						}
					}
				} else {
					?>
					<script>
						alert("No se admite ese tipo de archivo.");
						window.location.href = "<?php echo site_url('Productos'); ?>"; //Redirecciona despues del alert
					</script>
					<?php
					exit;
				}
			}
		}
		if ($this->Producto->existe($id)) {
			// Si el equipo ya existe, actualizar los datos
			$this->Producto->modificar($id, $data);
			$total = $data['cantidad'];
			if ($total <= 3){
				$this->enviarEmail();
			}
			redirect("Productos");
		} else {
			// Si no existe, crear un nuevo registro
			$data['id'] = $id; // Añadir el id solo para la creación
			$this->Producto->crear($data);
			$total = $data['cantidad'];
			if ($total <= 3){
				$this->enviarEmail();
			}
			redirect("Productos");
		}
	}
	public function eliminar(){

		$id = $this->input->post("id");
		$imagenEliminar = $this->input->post("imag");
		$rutaImgPc = FCPATH . str_replace('/', DIRECTORY_SEPARATOR, $imagenEliminar);
				
		$numDelete = $this->Producto->existeImg($imagenEliminar);
		if($numDelete == 1){
			if (file_exists($rutaImgPc)) {
				unlink($rutaImgPc); // Elimina la imagen
			}
		}
		$this->Producto->eliminarProd($id);
		redirect('Productos');
	}

	public function enviarEmail(){

		// Cargar la librería PHPMailer
        $this->load->library('phpmailer_lib');

        // Crear una instancia de PHPMailer
        $mail = $this->phpmailer_lib->load();

		try {
			$equi["equipos"]=$this->Producto->leerProd();
			$mensaje = [];
			date_default_timezone_set('America/Guayaquil');
			$year = date('Y');
			$mes = date('m');
			$dia = date('d');
			foreach ($equi["equipos"] as $equipo) {
				if($equipo->cantidad <= 3){
					$mensaje[] = "<span style = 'font-weight: bold;'>Nombre: </span>" . $equipo->nombre . " ";
					$mensaje[] = "<span style = 'font-weight: bold;'>Marca: </span>" . $equipo->marca . " ";
					$mensaje[] = "<span style = 'font-weight: bold;'>Tipo: </span>" . $equipo->tipo . " ";
					$mensaje[] = "<span style = 'font-weight: bold;'>Cantidad: </span>" . $equipo->cantidad . "<br>";
				}
			}
			$mensajeString = implode($mensaje);
            //Server settings
            $mail->SMTPDebug = 2;//Enable verbose debug output, 
            $mail->isSMTP();//Send using SMTP
            $mail->Host       = 'smtp.gmail.com';//Set the SMTP server to send through
            $mail->SMTPAuth   = true;//Enable SMTP authentication, true

            $mail->Username   = 'catotantony@gmail.com';//SMTP username
            $mail->Password   = 'ykktuhxybaesqkyn';//SMTP password

            $mail->SMTPSecure = $mail::ENCRYPTION_SMTPS;//Enable implicit TLS encryption, 
            $mail->Port       = 465;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`, 465

            //Recipients
            $mail->setFrom('catotantony@gmail.com');
            $mail->addAddress('alexander89jus@gmail.com');//Add a recipient,

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Equipos faltantes ' . $year . '/' . $mes . '/' . $dia;
            $mail->Body    = $mensajeString;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
			$mensaje= [];
            redirect('Productos');
        } catch (Exception $e) {
            echo "Error al enviar: {$mail->ErrorInfo}";
        }
	}

}
