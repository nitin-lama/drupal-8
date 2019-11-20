<?php

namespace Drupal\custom_form\Controller;

use Drupal\Core\Controller\ControllerBase;

class TestController extends ControllerBase {
	public function test() {
		$conn = \Drupal::database();
		$data = $conn->query("SELECT * from custom_example")->fetchAll();
		foreach ($data as $value) {
				dd($data);
}

	}
}
