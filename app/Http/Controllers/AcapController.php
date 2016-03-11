<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Acap;
use App\Repositories\AcapRepository;
use App\Repositories\CompanyRepository;

class AcapController extends Controller
{

	public function __construct(AcapRepository $acap, CompanyRepository $company){
		
		$this->questions = ["En la empresa, se le otorga tiempo a los trabajadores para que se dediquen al desarrollo de actividades de innovación", "En la empresa existe un presupuesto para el desarrollo de proyectos de innovación", "La empresa hace un uso sistemático de fuentes externas de financiación, nacionales e internacionales", "Nuestro sistema de recompensa y reconocimiento apoya la innovación", "La comunicación es efectiva en todos los niveles de la empresa", "En nuestra empresa se promueve la conformación de equipos interdepartamentales para resolver problemas", "Se rota frecuentemente a los empleados entre los diferentes departamentos/áreas", "Los empleados influyen significativamente en el diseño de las políticas y la organización del trabajo", "Los equipos de trabajo tienen autonomía para tomar decisiones", "Existen procedimientos formalizados para el desarrollo de las actividades de gestión y/o producción", "Se siguen de manera sistemática las normas y procedimientos establecidos", "Existe una fuerte dependencia de las relaciones informales y se suele cooperar de forma no programada a la hora de realizar el trabajo", "El desarrollo de innovaciones en los distintos ámbitos del negocio sigue un proceso definido y se apoya en herramientas concretas", "En la empresa se utilizan herramientas para identificar nuevas oportunidades y retos de innovación", "En la empresa se promueve la generación y búsqueda de ideas de manera sistemática", "Se cuenta con un sistema para escoger ideas y priorizar proyectos de innovación", "Nuestros proyectos de innovación usualmente se completan a tiempo y dentro del presupuesto", "En la empresa se sigue de manera sistemática procedimientos orientados a identificar e implementar el mecanismo de protección más adecuado para capturar el valor de las innovaciones (patentes, modelos de utilidad, marcas, secreto industrial, etc.).", "La empresa tiene y utiliza un sistema de medición concreto, en el que están claros sus distintos elementos (quién tiene la responsabilidad de medir, cómo realizar la medición, objetivos, etc.), de manera que se miden diversos indicadores de input y de output (sobre los resultados y su impacto), concretándose en lo que se puede denominar un cuadro de mando de innovación.", "En nuestra empresa se motiva a los empleados a que busquen información de fuentes pertenecientes a la industria (clientes, proveedores, competidores)", "En nuestra empresa se busca regularmente información proveniente de actores especializados (por ejemplo consultores, universidades etc.)", "La búsqueda de información externa relevante relacionada con el desempeño del negocio es una actividad cotidiana", "En nuestra empresa se recoge información sobre la industria a través de canales informales (por ejemplo, comida con amigos de la industria, charlas con socios comerciales, etc.)", "En la empresa no existen mecanismos formales para la captación del conocimiento externo", "En nuestra empresa la información que se obtiene de fuentes externas fluye rápidamente entre los diferentes departamentos (por ejemplo, si una unidad de negocio obtiene una información relevante, ésta es comunicada apropiadamente a todos las unidades y departamentos de la empresa)", "En nuestra empresa se promueve la discusión de la información adquirida de fuentes externas", "En nuestra empresa se alcanza un entendimiento colectivo de la información y del conocimiento que es adquirido a partir de fuentes externas", "La información y el conocimiento que se adquiere externamente se integra a la base de conocimiento de la empresa", "Nuestros empleados tienen la capacidad de estructurar y utilizar la información y el conocimiento adquirido externamente", "Nuestros empleados tienen la capacidad de trasformar el conocimiento adquirido externamente a partir de la base de conocimiento existente en la empresa.", "Nuestros empleados son capaces de aplicar el conocimiento adquirido externamente en su trabajo práctico", "Nuestros empleados tienen la capacidad de generar nuevo conocimiento a partir del conocimiento adquirido externamente", "Nuestra empresa tiene la capacidad de convertir la información y el conocimiento adquirido externamente en innovaciones exitosas", "Nuestra empresa tiene la habilidad de adoptar nuevas tecnologías y desarrollar procesos más eficientes", "En nuestra empresa existen mecanismos que promueven el desarrollo de prototipos de nuevos productos (bienes/servicios)", "Nuestra empresa tiene problemas para utilizar la información externa en el desarrollo de nuevos productos (bienes o servicios) o procesos", "Otras organizaciones dentro del grupo empresarial", "Proveedores de equipos, materiales, componentes o software", "Clientes", "Competidores y otras empresas de la misma industria", "Consultoras", "Laboratorios o empresas de I+D", "Universidades", "Agencias gubernamentales / Institutos de investigación sin fines de lucro"];

		$this->acap = $acap; 

		$this->company = $company;

		$this->middleware('auth');
	}

    public function create(Request $request, $id){
    	if($company = $this->company->forId($id)){
			if($request->user()->id == $company->user_id){
				if($request->isMethod('post')){
					$input = $request->all();
					unset($input['_token']);
    				$company->acap()->create($input);
    				$request->session()->flash('status', 'Su ACAP ha sido creado');
    				return redirect('/companies/view/' . $company->id);
    			}else{
    				return view('acap.create', ['company' => $company, 'questions' => $this->questions]);
    			}
			}else{
				abort(403, 'Usuario no autorizado');
			}
		}else{
			abort(404);
		}
    }

    public function update(Request $request, $id){
        if($acap = $this->acap->forId($id)){
            $this->authorize($acap);
            if($request->isMethod('post')){
            	$input = $request->all();
				unset($input['_token']);
                Acap::where('id', $id)->update($input);
                $request->session()->flash('status', 'Su ACAP ha sido actualizado');
                return redirect('/acap/update/' . $acap->id);
            }
            return view('acap.update', [
                'acap' => $acap,
                'questions' => $this->questions
            ]);
        }else{
            abort(404);
        }
    }
}
