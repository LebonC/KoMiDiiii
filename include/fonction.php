<?php

function debug($tableau) {
	echo '<pre>'.print_r($tableau, true).'</pre>';
}



function redirectJS($url, $delay = 1) {
	echo '<script>
		  setTimeout(function() {
		  		location.href = "'.$url.'"; }
		  , '.($delay * 1000).');
		  </script>';
}



/*
function displayList($title, $items, $class = 'default') {

	$html = '<div class="panel panel-'.$class.'">
		<div class="panel-heading">'.$title.'</div>
		<div class="list-group">';

		foreach($items as $key => $item) {
				$title = $item['title'];
			$html .= '<a href="movie.php?id='.$item['id'].'" class="list-group-item">'.$title.'</a>';
		}

	$html .= '</div>
	</div>';

	return $html;
}
*/

function displayList($title, $items, $class = 'default', $url = 'movie.php') {

	static $allowed_classes = array('default', 'info', 'primary', 'warning', 'danger', 'success');
	if (!in_array($class, $allowed_classes)) {
		$class = 'default';
	}

	include 'partials/list-panel.php';
}

