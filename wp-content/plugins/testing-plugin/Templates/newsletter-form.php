<?php
/*
 * Template Name: Contact Page
 */
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : "";
?>

	<div id="ezdev-newsletter" class="inside">
		<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="initial-form hide-if-no-js">
			<div class="input-text-wrap" id="title-wrap">
				<label for="email">Dirección de Correo Electronico</label>
				<input type="email" name="email" id="email" required>
			</div>
			<p class="submit">
				<input type="hidden" name="action" value="newsletter_form">
				<input type="submit" id="newsletter-add" class="button button-primary" value="Inscribirme al Newsletter">
				<br class="clear">
			</p>
		</form>
	</div>
	<div id="ezdv-message"><?php echo $message; ?></div>
<?php
