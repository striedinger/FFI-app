<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IcaiController extends Controller
{

	public function __construct(){
		$this->sectors = array(['rev'=>'0112', 'desc'=>' CULTIVO DE ARROZ'],
		['rev'=>'0113', 'desc'=>' CULTIVO DE HORTALIZAS, RAICES Y TUBERCULOS'],
		['rev'=>'0115', 'desc'=>' CULTIVO DE PLANTAS TEXTILES'],
		['rev'=>'0119', 'desc'=>' OTROS CULTIVOS TRANSITORIOS N.C.P.'],
		['rev'=>'0121', 'desc'=>' CULTIVO DE FRUTAS TROPICALES Y SUBTROPICALES'],
		['rev'=>'0122', 'desc'=>' CULTIVO DE PLATANO Y BANANO'],
		['rev'=>'0123', 'desc'=>' CULTIVO DE CAFÉ'],
		['rev'=>'0125', 'desc'=>' CULTIVO DE FLOR DE CORTE'],
		['rev'=>'0126', 'desc'=>' CULTIVO DE PALMA PARA ACEITE (PALMA AFRICANA) Y OTROS FRUTOS OLEAGINOSOS'],
		['rev'=>'0127', 'desc'=>' CULTIVO DE PLANTAS CON LAS QUE SE PREPARAN BEBIDAS'],
		['rev'=>'0129', 'desc'=>' OTROS CULTIVOS PERMANENTES N.C.P.'],
		['rev'=>'0140', 'desc'=>' GANADERÍA'],
		['rev'=>'0141', 'desc'=>' CRIA DE GANADO BOVINO Y BUFALINO'],
		['rev'=>'0143', 'desc'=>' CRIA DE OVEJAS Y CABRAS'],
		['rev'=>'0144', 'desc'=>' CRIA DE GANADO PORCINO'],
		['rev'=>'0145', 'desc'=>' CRIA DE AVES DE CORRAL'],
		['rev'=>'0149', 'desc'=>' CRIA DE OTROS ANIMALES N.C.P.'],
		['rev'=>'0150', 'desc'=>' EXPLOTACION MIXTA (AGRICOLA Y PECUARIA)'],
		['rev'=>'0161', 'desc'=>' ACTIVIDADES DE APOYO A LA AGRICULTURA'],
		['rev'=>'0162', 'desc'=>' ACTIVIDADES DE APOYO A LA GANADERIA'],
		['rev'=>'0163', 'desc'=>' ACTIVIDADES POSTERIORES A LA COSECHA'],
		['rev'=>'0164', 'desc'=>' TRATAMIENTO DE SEMILLAS PARA PROPAGACION'],
		['rev'=>'0170', 'desc'=>' CAZA ORDINARIA Y MEDIANTE TRAMPAS Y ACTIVIDADES DE SERVICIOS CONEXAS'],
		['rev'=>'0210', 'desc'=>' SILVICULTURA Y OTRAS ACTIVIDADES FORESTALES'],
		['rev'=>'0220', 'desc'=>' EXTRACCION DE MADERA'],
		['rev'=>'0240', 'desc'=>' SERVICIOS DE APOYO A LA SILVICULTURA'],
		['rev'=>'0311', 'desc'=>' PESCA MARITIMA'],
		['rev'=>'0321', 'desc'=>' ACUICULTURA MARITIMA'],
		['rev'=>'0322', 'desc'=>' ACUICULTURA DE AGUA DULCE'],
		['rev'=>'1011', 'desc'=>' PROCESAMIENTO Y CONSERVACION DE CARNE Y PRODUCTOS CARNICOS'],
		['rev'=>'1012', 'desc'=>' PROCESAMIENTO Y CONSERVACION DE PESCADOS, CRUSTACEOS Y MOLUSCOS'],
		['rev'=>'1020', 'desc'=>' PROCESAMIENTO Y CONSERVACION DE FRUTAS, LEGUMBRES, HORTALIZAS Y TUBERCULOS'],
		['rev'=>'1030', 'desc'=>' ELABORACION DE ACEITES Y GRASAS DE ORIGEN VEGETAL Y ANIMAL'],
		['rev'=>'1040', 'desc'=>' ELABORACION DE PRODUCTOS LACTEOS'],
		['rev'=>'1051', 'desc'=>' ELABORACION DE PRODUCTOS DE MOLINERIA'],
		['rev'=>'1062', 'desc'=>' DESCAFEINADO, TOSTION Y MOLIENDA DEL CAFE'],
		['rev'=>'1081', 'desc'=>' ELABORACION DE PRODUCTOS DE PANADERIA'],
		['rev'=>'1082', 'desc'=>' ELABORACION DE CACAO, CHOCOLATE Y PRODUCTOS DE CONFITERIA'],
		['rev'=>'1084', 'desc'=>' ELABORACION DE COMIDAS Y PLATOS PREPARADOS'],
		['rev'=>'1089', 'desc'=>' ELABORACION DE OTROS PRODUCTOS ALIMENTICIOS N.C.P.'],
		['rev'=>'1090', 'desc'=>' ELABORACION DE ALIMENTOS PREPARADOS PARA ANIMALES'],
		['rev'=>'1101', 'desc'=>' DESTILACION, RECTIFICACION Y MEZCLA DE BEBIDAS ALCOHOLICAS'],
		['rev'=>'1103', 'desc'=>' PRODUCCION DE MALTA, ELABORACION DE CERVEZAS Y OTRAS BEBIDAS MALTEADAS'],
		['rev'=>'1104', 'desc'=>' ELABORACION DE BEBIDAS NO ALCOHOLICAS, PRODUCCION DE AGUAS MINERALES Y OTRAS AGUAS EMBOTELLADAS'],
		['rev'=>'1610', 'desc'=>' ASERRADO, ACEPILLADO E IMPREGNACION DE LA MADERA'],
		['rev'=>'1620', 'desc'=>' FABRICACION DE HOJAS DE MADERA PARA ENCHAPADO; FABRICACION DE TABLEROS CONTRACHAPADOS TABLEROS LAMINADOS, TABLEROS DE PARTICULAS Y OTROS TABLEROS Y PA'],
		['rev'=>'1630', 'desc'=>' FABRICACION DE PARTES Y PIEZAS DE MADERA, DE CARPINTERIA Y EBANISTERIA PARA LA CONSTRUCCION'],
		['rev'=>'1640', 'desc'=>' FABRICACION DE RECIPIENTES DE MADERA'],
		['rev'=>'1690', 'desc'=>' FABRICACION DE OTROS PRODUCTOS DE MADERA; FABRICACION DE ARTICULOS DE CORCHO, CESTERIA Y ESPARTERIA'],
		['rev'=>'2011', 'desc'=>' FABRICACION DE SUSTANCIAS Y PRODUCTOS QUIMICOS BASICOS'],
		['rev'=>'2012', 'desc'=>' FABRICACION DE ABONOS Y COMPUESTOS INORGANICOS NITROGENADOS'],
		['rev'=>'2013', 'desc'=>' FABRICACION DE PLASTICOS EN FORMAS PRIMARIAS'],
		['rev'=>'2014', 'desc'=>' FABRICACION DE CAUCHO SINTETICO EN FORMAS PRIMARIAS'],
		['rev'=>'2821', 'desc'=>' FABRICACION DE MAQUINARIA AGROPECUARIA Y FORESTAL'],
		['rev'=>'2825', 'desc'=>' FABRICACION DE MAQUINARIA PARA LA ELABORACION DE ALIMENTOS, BEBIDAS Y TABACO'],
		['rev'=>'4620', 'desc'=>' COMERCIO AL POR MAYOR DE MATERIAS PRIMAS AGROPECUARIAS; ANIMALES VIVOS'],
		['rev'=>'4631', 'desc'=>' COMERCIO AL POR MAYOR DE PRODUCTOS ALIMENTICIOS'],
		['rev'=>'4632', 'desc'=>' COMERCIO AL POR MAYOR DE BEBIDAS Y TABACO'],
		['rev'=>'4653', 'desc'=>' COMERCIO AL POR MAYOR DE MAQUINARIA Y EQUIPO AGROPECUARIOS'],
		['rev'=>'4659', 'desc'=>' COMERCIO AL POR MAYOR DE OTROS TIPOS DE MAQUINARIA Y EQUIPO N.C.P.'],
		['rev'=>'4711', 'desc'=>' (P) COMERCIO AL POR MENOR EN ESTABLECIMIENTOS NO ESPECIALIZADOS CON SURTIDO COMPUESTO PRINCIPALMENTE POR ALIMENTOS, BEBIDAS O TABACO'],
		['rev'=>'4719', 'desc'=>' COMERCIO AL POR MENOR EN ESTABLECIMIENTOS NO ESPECIALIZADOS, CON SURTIDO COMPUESTO PRINCIPALMENTE POR PRODUCTOS DIFERENTES DE ALIMENTOS'],
		['rev'=>'4721', 'desc'=>' COMERCIO AL POR MENOR DE PRODUCTOS AGRICOLAS PARA EL CONSUMO EN ESTABLECIMIENTOS ESPECIALIZADOS'],
		['rev'=>'4722', 'desc'=>' COMERCIO AL POR MENOR DE LECHE, PRODUCTOS LACTEOS Y HUEVOS, EN ESTABLECIMIENTOS ESPECIALIZADOS'],
		['rev'=>'4723', 'desc'=>' COMERCIO AL POR MENOR DE CARNES (INCLUYE AVES DE CORRAL), PRODUCTOS CARNICOS, PESCADOS Y PRODUCTOS DE MAR, EN ESTABLECIMIENTOS ESPECIALIZADOS'],
		['rev'=>'4724', 'desc'=>' COMERCIO AL POR MENOR DE BEBIDAS Y PRODUCTOS DEL TABACO, EN ESTABLECIMIENTOS ESPECIALIZADOS'],
		['rev'=>'4729', 'desc'=>' COMERCIO AL POR MENOR DE OTROS PRODUCTOS ALIMENTICIOS N.C.P., EN ESTABLECIMIENTOS ESPECIALIZADOS']);
		$this->markets = ["Local, Nacional, Internacional", "Local, Internacional, Nacional", "Nacional, Local, Internacional", "Nacional, Internacional, Local", "Internacional, Local, Nacional", "Internacional, Nacional, Local"];
		$this->activities = ["Ampliación de la gama de bienes y servicios", "Ingreso a nuevos mercados o incrementos de la participación en el mercado actual", "Aumentar la capacidad y/o flexibilidad para la producción de bienes y servicios", "Reducción de costos por unidad producida (p.e. laboral, consumo de materiales y de energía, etc.)", "Reducción del impacto medioambiental o mejorar la sanidad y la seguridad", "Reducir el tiempo de respuesta a la necesidad del cliente y/o proveedor", "Mejorar la habilidad para desarrollar nuevos productos y/o procesos", "Mejorar la calidad de sus bienes y/o servicios", "Mejorar la comunicación y/o participación de información dentro de su empresa y/o con otras empresas y/o instituciones", "Incrementar o mantener la participación de mercado", "Introducir productos para un nuevo segmento de mercado", "Introducir productos para un mercado geográficamente nuevo"];
		$this->barriers = ["Falta de fondos propios", "Falta de financiamiento externo a la empresa", "Alto costo de la innovación", "Falta de personal calificado", "Falta de información sobre la tecnología", "Falta de información sobre los mercados", "Dificultad en encontrar socios de cooperación para innovación", "Mercado dominado por empresas establecidas", "Incertidumbre respecto a la demanda por bienes o servicios innovadores", "No es necesario debido a innovaciones previas", "No es necesario por falta de demanda de innovaciones", "Dificultad regulatoria"];
		$this->sources = ["Fuentes internas (generados al interior de la empresa)", "Proveedores", "Clientes", "Competidores u otras empresas del mismo sector", "Consultores, laboratorios comerciales", "Universidades u otras instituciones de educación superior", "Institutos de investigación públicos", "Agremiaciones y/o asociaciones sectoriales", "Conferencias, ferias y exposiciones", "Revistas científicas, base de datos de patentes", "Asociaciones a nivel profesional e industrial", "Internet"];
		$this->partners = ["Otras empresas de su mismo grupo", "Proveedores", "Clientes", "Competidores", "Consultores", "Universidades", "Centros de Desarrollo Tecnológico", "Centros de Investigación", "Parques Tecnológicos", "Centros Regionales de Productividad", "Organizaciones Internacionales"];
		$this->middleware('auth');
	}

	public function create(Request $request){
		return view('icai.create', ["sectors" => $this->sectors, "markets" => $this->markets, "activities" => $this->activities, "barriers" => $this->barriers, "sources" => $this->barriers, "partners" => $this->partners]);
	}
}
