<?php

class Helpers {

	public function input($type, $name, $id, $placeholder) {
		return "
		<div class='mb-3'>
            <input type='{$type}' name='{$name}' id='{$id}' placeholder='{$placeholder}' class='form-control form-control-lg'>
        </div>
		";
	}

	public function button($type, $name, $class, $color, $texte) {
		return "<button type='{$type}' name='{$name}' class='btn btn-lg btn-{$class} fw-bold text-{$color} active'>{$texte}</button>";
	}

	public function label($id, $class, $texte) {
		return "<label for='{$id}' class='form-label text-{$class} text-lg'>{$texte}</label>";
	}

	public function select($id, $icon, $texte, $name, $options = array()) {
		$html = "<div class='mb-3'>
		<label for='{$id}' class='form-label text-dark'>
			<i class='align-middle me-1 fas fa-fw fa-{$icon}'></i>
			{$texte}
		</label>
		<select id='{$id}' name='{$name}' class='form-select form-control-lg'>
		";
		foreach ($options as $key => $value) {
			$html .= "<option value='{$key}'>{$value}</option>";
		}
		$html .= "</select></div>";
		return $html;
	}

	public function submit($type, $name, $texte) {
		return "
		<div class='d-flex justify-content-center'>
            <div class='d-grid gap-2 col-12 mx-auto'>
                <button type='{$type}' name='{$name}' class='btn btn-lg btn-success active fw-bold fs-4 mt-4'>
					{$texte}
				</button>
            </div>
        </div>
		";
	}

	public function lien($pageUrl, $pageName) {
		return "
		<li class='sidebar-item active'>
			<a class='sidebar-link' href='{$pageUrl}'>
      			<span class='align-middle'>{$pageName}</span>
    		</a>
		</li>
		";
	}
}

?>