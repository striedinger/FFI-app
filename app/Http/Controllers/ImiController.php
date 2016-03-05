<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImiController extends Controller
{

	public function __construct(){

		$this->questions = ["Los trabajadores tienen una idea clara de como la innovación nos ayuda a competir", "Tenemos procesos claros que nos ayudan a gestionar el desarrollo de nuevos productos desde la idea hasta el lanzamiento", "Tenemos una relación ganar-ganar con nuestros proveedores", "Los trabajadores trabajan bien en equipo sin importar áreas o departamentos", "Los clientes conocen nuestra propuesta de valor", "Trabajamos bien con otras instituciones de educación superior o centros de investigación", "Nuestra estructura permite la toma de decisiones de manera rápida y efectiva", "Co-creamos con nuestros clientes para explorar y desarrollar nuevos conceptos", "Hacemos comparaciones sistemáticas de nuestros productos con otros competidores", "Buscamos ideas de manera sistemática", "La comunicación es efectiva en todos los niveles de la empresa", "Colaboramos con otras empresas para desarrollar nuevos productos o procesos", "Compartimos experiencias con otras empresas que nos ayudan en el proceso de aprendizaje", "Hay un gran compromiso en la dirección para incentivar la innovación", "Contamos con mecanismos para garantizar la participación temprana de todos los departamentos en el desarrollo de nuevos productos y procesos", "Nuestro sistema de recompensa y reconocimiento apoya la innovación", "Somos buenos en la captura de lo que hemos aprendido y en la transferencia de este conocimiento a todos los trabajadores de la empresa", "Tenemos un sistema para escoger proyectos de innovación", "Existe un claro vínculo entre los proyectos de innovación que desarrollamos y la estrategia global de la empresa", "Utilizamos la medición para ayudar a identificar dónde y cuándo podemos mejorar nuestra gestión de la innovación"];

		$this->middleware('auth');
	}

    public function create(Request $request){
    	return view('imi.create', ['questions' => $this->questions]);
    }
}
