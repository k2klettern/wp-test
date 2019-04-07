<?php
namespace ezdev\TestingPlugin;

use ezdev\TestingPlugin\Services\MailCheck as MailCheck;

class MainController {

	public function __construct() {
		add_action('wp_dashboard_setup', [$this, 'add_dashboard_widgets']);
		add_action('admin_post_newsletter_form', [$this, 'form_submit_processing']);
	}

	public function dashboard_widget_function() {
		include_once PLUGINS_PATH . '/Templates/newsletter-form.php';
	}

	public function add_dashboard_widgets() {
		wp_add_dashboard_widget('dashboard_widget', 'Testing WordCamp Madrid 2019', [$this, 'dashboard_widget_function']);
	}

	public function form_submit_processing() {
		$return = "El Correo no puede estar vacio";
		if (isset($_POST['email'])) {
			$em = new MailCheck(($_POST['email']));
			if($em) {
				// Hacemos algo con el correo como Guardarlo o enviarlo por API
				$return = "Gracias por subscribirte";
			} else {
				$return = "EL correo tiene un formato no valido";
			}
		}
		wp_redirect(admin_url('?message='  . urlencode($return)));
		die;
	}

}