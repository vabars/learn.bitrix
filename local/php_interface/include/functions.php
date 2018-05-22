<?php
function dump($var, $die = FALSE, $all = FALSE) {
	global $USER;
	if ($USER -> IsAdmin() || ($all == TRUE)) {
		?>
		<font style="text-align: left; font-size: 10px;"><pre><?var_dump($var)?></pre></font><br />
		<?php
	}
	if ($die) {
		die;
	}
}

function my_dump($var) {
	global $USER;
		if ($USER->IsAdmin()) {
			?>
			<pre>
				<?print_r($var);?>
			</pre>
		<?}

}
?>