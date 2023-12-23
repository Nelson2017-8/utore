<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UtilsController extends Controller
{
	// Valida y completa un array para enviar a la vista y generar un formulario automatico
    public static function StandardFormComponent (Array $form)
	{
		foreach ($form as $key => $item) {
			$selector = $form[$key];

			// rellenando campos
			if (empty($selector['placeholder'])){
				$form[$key]['placeholder'] = '';
			}
			if (empty($selector['model'])){
				$form[$key]['model'] = $form[$key]['value'];
			}
			if (empty($selector['hidden_value'])){
				$form[$key]['hidden_value'] = false;
			}
			if (empty($selector['editing'])){
				$form[$key]['editing'] = false;
			}
			if (empty($selector['type'])){
				$form[$key]['type'] = 'input';
			}
			if (empty($selector['validation'])){
				$form[$key]['validation'] = null;
			}
			if (empty($selector['isValidate'])){
				$form[$key]['isValidate'] = false;
			}

			// validando campos
		}

		return $form;
	}

	// Obtener todas las rutas registradas

	public static function Config () {
		return [
			'routes' => self::GetRoutes(),
			'url_base' => env('APP_URL'),
			'user' => auth()->user(),
		];
	}
	public static function GetRoutes () {
		// Obtener todas las rutas registradas
		$routes = Route::getRoutes();
		$routesArray = [];
		// Iterar sobre las rutas y obtener sus detalles
		foreach ($routes as $route) {
			$name = $route->getName();
			if ($name == 'sanctum.csrf-cookie' || substr($name, 0, 8) == 'ignition'){
				continue;
			}
			$routesArray[] = [
				'name' => $route->getName(),
				'uri' => $route->uri(),
				'method' => $route->methods()[0],
			];
		}

		return $routesArray;
	}
}
