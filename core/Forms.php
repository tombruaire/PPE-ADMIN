<?php

class Forms {

	public function input($id, $icon, $texte, $type, $name) {
		return "
		<div class='mb-3'>
			<label for='{$id}' class='form-label text-dark'>
				<i class='align-middle me-1 fas fa-fw fa-{$icon}'></i>
				{$texte}
			</label>
			<input type='{$type}' name='{$name}' id='{$id}' class='form-control form-control-lg' required>
		</div>
		";
	}

	public function edit($type, $name, $value) {
		return "<td><input type='{$type}' name='{$name}' autocomplete='off' value='{$value}' class='form-control'></td>";
	}
}

?>