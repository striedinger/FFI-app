<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Icai;
use App\Repositories\IcaiRepository;
use App\Repositories\CompanyRepository;

class IcaiController extends Controller
{

	public function __construct(IcaiRepository $icai, CompanyRepository $company){
		$this->education = ["Básica Primaria", "Básica Secundaria", "Técnica Profesional", "Tecnológica", "Profesional Universitario", "Especialización", "Maestría", "Doctorado"];
		$this->markets = ["Local, Nacional, Internacional", "Local, Internacional, Nacional", "Nacional, Local, Internacional", "Nacional, Internacional, Local", "Internacional, Local, Nacional", "Internacional, Nacional, Local"];
		$this->activities = ["Ampliación de la gama de bienes y servicios", "Ingreso a nuevos mercados o incrementos de la participación en el mercado actual", "Aumentar la capacidad y/o flexibilidad para la producción de bienes y servicios", "Reducción de costos por unidad producida (p.e. laboral, consumo de materiales y de energía, etc.)", "Reducción del impacto medioambiental o mejorar la sanidad y la seguridad", "Reducir el tiempo de respuesta a la necesidad del cliente y/o proveedor", "Mejorar la habilidad para desarrollar nuevos productos y/o procesos", "Mejorar la calidad de sus bienes y/o servicios", "Mejorar la comunicación y/o participación de información dentro de su empresa y/o con otras empresas y/o instituciones", "Incrementar o mantener la participación de mercado", "Introducir productos para un nuevo segmento de mercado", "Introducir productos para un mercado geográficamente nuevo"];
		$this->barriers = ["Falta de fondos propios", "Falta de financiamiento externo a la empresa", "Alto costo de la innovación", "Falta de personal calificado", "Falta de información sobre la tecnología", "Falta de información sobre los mercados", "Dificultad en encontrar socios de cooperación para innovación", "Mercado dominado por empresas establecidas", "Incertidumbre respecto a la demanda por bienes o servicios innovadores", "No es necesario debido a innovaciones previas", "No es necesario por falta de demanda de innovaciones", "Dificultad regulatoria"];
		$this->sources = ["Fuentes internas (generados al interior de la empresa)", "Proveedores", "Clientes", "Competidores u otras empresas del mismo sector", "Consultores, laboratorios comerciales", "Universidades u otras instituciones de educación superior", "Institutos de investigación públicos", "Agremiaciones y/o asociaciones sectoriales", "Conferencias, ferias y exposiciones", "Revistas científicas, base de datos de patentes", "Asociaciones a nivel profesional e industrial", "Internet"];
		$this->partners = ["Otras empresas de su mismo grupo", "Proveedores", "Clientes", "Competidores", "Consultores", "Universidades", "Centros de Desarrollo Tecnológico", "Centros de Investigación", "Parques Tecnológicos", "Centros Regionales de Productividad", "Organizaciones Internacionales"];

		$this->icai = $icai; 

		$this->company = $company;

		$this->middleware('auth');
	}

	public function create(Request $request, $id){
    	if($company = $this->company->forId($id)){
			if($request->user()->id == $company->user_id){
                if(count($company->icai)==0){
                    if($request->isMethod('post')){
                        $input = $request->all();
                        unset($input['_token']);
                        $company->icai()->create($input);
                        $request->session()->flash('status', 'Su ICAi ha sido creado');
                        return redirect('/companies/view/' . $company->id);
                    }else{
                        return view('icai.create', ['company' => $company, "education" => $this->education, "markets" => $this->markets, "activities" => $this->activities, "barriers" => $this->barriers, "sources" => $this->sources, "partners" => $this->partners]);
                    }
                }else{
                    $request->session()->flash('status', 'Usted ya ha diligenciado el ICAi');
                    return redirect('/companies/view/' . $company->id);
                }
			}else{
				abort(403, 'Usuario no autorizado');
			}
		}else{
			abort(404);
		}
    }

    public function update(Request $request, $id){
        if($icai = $this->icai->forId($id)){
            $this->authorize($icai);
            if($request->isMethod('post')){
            	$input = $request->all();
				unset($input['_token']);
                Icai::where('id', $id)->update($input);
                $request->session()->flash('status', 'Su ICAi ha sido actualizado');
                return redirect('/icai/update/' . $icai->id);
            }
            return view('icai.update', [
                'icai' => $icai,
                "education" => $this->education, "markets" => $this->markets, "activities" => $this->activities, "barriers" => $this->barriers, "sources" => $this->sources, "partners" => $this->partners
            ]);
        }else{
            abort(404);
        }
    }

}
