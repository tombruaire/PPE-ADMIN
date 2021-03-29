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

	public function select($id, $texte, $name, $options = array()) {
		$html = "<div class='form-group'>
		<label for='{$id}' class='form-label'>{$texte}</label>
		<select id='{$id}' name='{$name}' class='form-control'>
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

	public function lien($pageUrl, $icon, $pageName) {
		return "
		<li class='nav-item'>
            <a class='d-flex align-items-center' href='{$pageUrl}'>
                <i data-feather='{$icon}'></i>
                <span class='menu-title text-truncate'>{$pageName}</span>
            </a>
        </li>
		";
	}

	public function header($texte) {
		return "
		<li class='navigation-header'>
            <span>$texte</span>
            <i data-feather='more-horizontal'></i>
        </li>
		";
	}
}

?>