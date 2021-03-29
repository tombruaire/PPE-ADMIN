<?php

class Forms {

	public function input($id, $texte, $type, $name) {
		return "
		<div class='form-group'>
            <label for='{$id}'>$texte</label>
            <input type='{$type}' name='{$name}' id='{$id}' class='form-control'>
        </div>
		";
	}

	public function edit($type, $name, $value) {
		return "<td><input type='{$type}' name='{$name}' autocomplete='off' value='{$value}' class='form-control'></td>";
	}

	public function buttons() {
		return "
		<td>
			<button type='submit' name='modifier' class='btn btn-primary me-2'>
				<i class='align-middle' data-feather='check'></i>
			</button>
			<button type='submit' name='retour' class='btn btn-danger'>
				<i class='align-middle' data-feather='x'></i>
			</button>
		</td>
		";
	}
}

?>