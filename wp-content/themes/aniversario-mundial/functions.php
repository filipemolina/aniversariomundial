<?php

	// Chamar o jQuery para as páginas

	function chamar_jQuery() {
		if (!is_admin()) {
			wp_enqueue_script('jquery');
		}
	}
	add_action('init', 'chamar_jQuery');