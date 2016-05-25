<?php

use Illuminate\Database\Seeder;

use App\User;

use App\State;

use App\Role;

use App\Term;

use App\Center;

use App\Line;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->command->info('Roles table seeded');
        $this->call(StatesTableSeeder::class);
        $this->command->info('States table seeded');
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table seeded');
        $this->call(TermsTableSeeder::class);
        $this->command->info('Terms table seeded');
        $this->call(CentersTableSeeder::class);
        $this->command->info('Centers table seeded');
        $this->call(LinesTableSeeder::class);
        $this->command->info('Lines table seeded');
    }
}

class RolesTableSeeder extends Seeder{
    public function run(){
        DB::table('roles')->delete();
        Role::create(['id' => 1, 'name' => 'Administrador', 'description' => 'Administrador de la plataforma']);
        Role::create(['id' => 2, 'name' => 'Asistente', 'description' => 'Asistente del programa']);
        Role::create(['id' => 3, 'name' => 'Evaluador', 'description' => 'Evaluador de proyectos']);
        Role::create(['id' => 4, 'name' => 'Consultor', 'description' => 'Consultor de proyectos']);
        Role::create(['id' => 5, 'name' => 'Empresario', 'description' => 'Empresario usuario']);
    }
}

class UsersTableSeeder extends Seeder{
    public function run(){
        DB::table('users')->delete();
    }
}

class StatesTableSeeder extends Seeder{
    public function run(){
        DB::table('states')->delete();
        State::create(['id' => 1, 'name' => 'Atlántico', 'active' => true]);
        State::create(['id' => 2, 'name' => 'Bolívar', 'active' => true]);
        State::create(['id' => 3, 'name' => 'Magdalena', 'active' => true]);
        State::create(['id' => 4, 'name' => 'Córdoba', 'active' => true]);
        State::create(['id' => 5, 'name' => 'Sucre', 'active' => true]);
        State::create(['id' => 6, 'name' => 'Cesar', 'active' => true]);
        State::create(['id' => 7, 'name' => 'La Guajira', 'active' => true]);
        State::create(['id' => 8, 'name' => 'San Andrés', 'active' => true]);
    }
}

class TermsTableSeeder extends Seeder{
    public function run(){
        DB::table('terms')->delete();
        Term::create(['name' => '2016-1', 'active' => true]);
    }
}

class CentersTableSeeder extends Seeder{
    public function run(){
        DB::table('centers')->delete();
        //Atlantico
        Center::create(['id' => 1, 'name' => 'CEDAGRO', 'group_name' => 'GRUPO DE INVESTIGACIÓN PARA EL MEJORAMIENTO DE LA PRODUCCION PRIMARIA, AGROINDUSTRIA Y MEDIO AMBIENTE', 'state_id' => 1]);
        Center::create(['id' => 2, 'name' => 'CENTRO DE COMERCIO Y SERVICIOS GRUPO DE INVESTIGACIÓN', 'group_name' => 'ARCADIA', 'state_id' => 1]);
        Center::create(['id' => 3, 'name' => 'CENTRO NACIONAL COLOMBO ALEMÁN', 'group_name' => 'CNCA', 'state_id' => 1]);
        Center::create(['id' => 4, 'name' => 'CENTRO INDUSTRIAL Y DE AVIACIÓN', 'state_id' => 1]);
        //Bolivar
        Center::create(['id' => 5, 'name' => 'CENTRO DE COMERCIO Y SERVICIOS-REGIONAL BOLÍVAR', 'group_name' => 'GRUPO DE INVESTIGACIÓN GIBEI', 'state_id' => 2]);
        Center::create(['id' => 6, 'name' => 'CENTRO INTERNACIOAL NÁUTICO FUVIAL Y PORTUARIO', 'group_name' => 'GRUPO DE INVESTIGACIÓN SENA CINAFLUP', 'state_id' => 2]);
        Center::create(['id' => 7, 'name' => 'CENTRO PARA LA INDUSTRIA PETROQUIMICA', 'group_name' => 'GIPIPQ', 'state_id' => 2]);
        Center::create(['id' => 8, 'name' => 'CENTRO AGROEMPRESARIAL Y MINERO', 'group_name' => 'GIBIOMAS', 'state_id' => 2]);
        //Magdalena
        Center::create(['id' => 9, 'name' => 'CENTRO DE LOGÍSTICA', 'state_id' => 3]);
        Center::create(['id' => 10, 'name' => 'CENTRO ACUICOLA Y AGROINDUSTRIAL DE GAIRA ', 'state_id' => 3]);
        //Cordoba
        Center::create(['id' => 11, 'name' => 'CENTRO DE COMERCIO, INDUSTRIA Y TURISMO', 'state_id' => 4]);
        //Sucre
        //Cesar
        Center::create(['id' => 12, 'name' => 'SENA-REGIONAL CESÁR', 'state_id' => 6]);
        //La Guajira
        Center::create(['id' => 13, 'name' => 'CENTRO INDUSTRIAL Y DE ENERGÍAS ALTERNATIVAS', 'state_id' => 7]);
        Center::create(['id' => 14, 'name' => 'CENTRO AGROEMPRESARIAL Y ACUICOLA DE LA REGIONAL GUAJIRA', 'state_id' => 7]);
        //San Andres
    }
}

class LinesTableSeeder extends Seeder{
    public function run(){
        DB::table('lines')->delete();
        //Atlantico
        Line::create(['id' => 1, 'name' => 'Producción primaria', 'center_id' => 1]);
        Line::create(['id' => 2, 'name' => 'Agroindustria', 'center_id' => 1]);
        Line::create(['id' => 3, 'name' => 'Medio ambiente y sociedad', 'center_id' => 1]);
        Line::create(['id' => 4, 'name' => 'Jóvenes rurales emprendedores y poblaciones especiales', 'center_id' => 1]);
        Line::create(['id' => 5, 'name' => 'Emprendimiento y empresarismo', 'center_id' => 1]);

        Line::create(['id' => 6, 'name' => 'Logística integral', 'center_id' => 2]);
        Line::create(['id' => 7, 'name' => 'Hoteleria y Turismo', 'center_id' => 2]);
        Line::create(['id' => 8, 'name' => 'Innovación empresarial', 'center_id' => 2]);
        Line::create(['id' => 9, 'name' => 'Pedagogía y didáctica', 'center_id' => 2]);

        Line::create(['id' => 10, 'name' => 'Electrónica y Telecomunicaciones', 'center_id' => 3]);
        Line::create(['id' => 11, 'name' => 'Tecnologías Virtuales', 'center_id' => 3]);
        Line::create(['id' => 12, 'name' => 'Diseño Metalmecánico', 'center_id' => 3]);
        Line::create(['id' => 13, 'name' => 'Seguridad Ocupacional', 'center_id' => 3]);

        Line::create(['id' => 14, 'name' => 'Gestión de la tecnología', 'center_id' => 4]);
        Line::create(['id' => 15, 'name' => 'Mecánica Automotriz', 'center_id' => 4]);
        Line::create(['id' => 16, 'name' => 'Innovación Educativa', 'center_id' => 4]);
        Line::create(['id' => 17, 'name' => 'Educación en salud ocupacional y medio ambiente', 'center_id' => 4]);

        //Bolivar

        Line::create(['id' => 18, 'name' => 'Innovación Tecnológica en Procesos gastronómicos', 'center_id' => 5]);
        Line::create(['id' => 19, 'name' => 'Turismo Sostenible', 'center_id' => 5]);
        Line::create(['id' => 20, 'name' => 'Manejo Holístico en el Sector Turístico', 'center_id' => 5]);
        Line::create(['id' => 21, 'name' => 'Empaque, embalaje y transporte', 'center_id' => 5]);
        Line::create(['id' => 22, 'name' => 'Seguridad Industrial y Salud Ocupacional', 'center_id' => 5]);
        Line::create(['id' => 23, 'name' => 'Procesos de negocios BPO&O', 'center_id' => 5]);
        Line::create(['id' => 24, 'name' => 'Administración de Servicios Financieros. Banca Múltiple y Microfinanzas', 'center_id' => 5]);
        Line::create(['id' => 25, 'name' => 'Agroindustria y Biotecnología', 'center_id' => 5]);
        Line::create(['id' => 26, 'name' => 'Practicas Pedagógicas para la Formación Profesional Integral', 'center_id' => 5]);

        Line::create(['id' => 27, 'name' => 'Biotecnología aplicada a la acuicultura y medio ambiente. Jorge Sánchez y Carmen Dávila', 'center_id' => 6]);
        Line::create(['id' => 28, 'name' => 'Logística y Transporte José Ángel González', 'center_id' => 6]);
        Line::create(['id' => 29, 'name' => 'Desarrollo de Procesos Administrativos y Gestión de Mercados. Hernando Gómez', 'center_id' => 6]);
        Line::create(['id' => 30, 'name' => 'Innovación Tecnológica en Procesamiento y Control de Calidad en Alimentos', 'center_id' => 6]);
        Line::create(['id' => 31, 'name' => 'Sistemas  de Gestión  de Calidad, Medio Ambiente, Seguridad y Salud Ocupacional', 'center_id' => 6]);
        Line::create(['id' => 32, 'name' => 'Innovación, Investigación y Desarrollo Tecnológico para la Formación Profesional Integral  (Pedagogía  de Procesos y estrategias Pedagógicas)', 'center_id' => 6]);

        Line::create(['id' => 33, 'name' => 'Biopolímeros ', 'center_id' => 7]);
        Line::create(['id' => 34, 'name' => 'Fuentes alternas de producción de etanol', 'center_id' => 7]);
        Line::create(['id' => 35, 'name' => 'Procesos de conversión media en petróleo', 'center_id' => 7]);
        Line::create(['id' => 36, 'name' => 'Productividad, Calidad e Innovación', 'center_id' => 7]);
        Line::create(['id' => 37, 'name' => 'Reciclaje Mecánico y/o Químico de polímeros    ', 'center_id' => 7]);
        Line::create(['id' => 38, 'name' => 'Tecnologías de la información, diseño y desarrollo de software', 'center_id' => 7]);
        Line::create(['id' => 39, 'name' => 'Diseño de  prototipos, fabricación de equipos y mantenimiento', 'center_id' => 7]);
        Line::create(['id' => 40, 'name' => 'Construcción', 'center_id' => 7]);

        Line::create(['id' => 41, 'name' => 'Biotecnología Aplicada y Microbiología (BAM)', 'center_id' => 8]);
        Line::create(['id' => 42, 'name' => 'Ambiente y Recursos Naturales  (ARN)', 'center_id' => 8]);
        Line::create(['id' => 43, 'name' => 'Ciencia y Tecnología Agroindustrial (C&TA)', 'center_id' => 8]);
        Line::create(['id' => 44, 'name' => 'Ciencias Agrícolas y Pecuarias (CAPs)', 'center_id' => 8]);
        Line::create(['id' => 45, 'name' => 'Sistemas Integrado de Gestión de la Calidad, Medio Ambiente , Seguridad Ocupacional', 'center_id' => 8]);

        //Magdalena

        Line::create(['id' => 46, 'name' => 'Economia, Innovacion, Competitividad y Sostenibilidad', 'center_id' => 9]);
        Line::create(['id' => 47, 'name' => 'Innovaciones Educativas', 'center_id' => 9]);
        Line::create(['id' => 48, 'name' => 'Desarrollo Humano, Ética y Calidad de Vida', 'center_id' => 9]);
        Line::create(['id' => 49, 'name' => 'Diversidad Étnica y Cultura, Derechos y Políticas Públicas', 'center_id' => 9]);

        Line::create(['id' => 50, 'name' => 'Producción agrícola sostenible', 'center_id' => 10]);
        Line::create(['id' => 51, 'name' => 'Producción de alimentos nutracéuticos', 'center_id' => 10]);
        Line::create(['id' => 52, 'name' => 'Acuicultura', 'center_id' => 10]);
        Line::create(['id' => 53, 'name' => 'Producción pecuaria sostenible', 'center_id' => 10]);
        Line::create(['id' => 54, 'name' => 'Biotecnología agroindustrial', 'center_id' => 10]);
        Line::create(['id' => 55, 'name' => 'Automatización de procesos agroindustriales', 'center_id' => 10]);
        Line::create(['id' => 56, 'name' => 'Energías renovables', 'center_id' => 10]);
        Line::create(['id' => 57, 'name' => 'Transformación de residuos sólidos', 'center_id' => 10]);

        //Cordoba

        Line::create(['id' => 58, 'name' => 'Comercio y servicios', 'center_id' => 11]);
        Line::create(['id' => 59, 'name' => 'Servicios a la industria', 'center_id' => 11]);
        Line::create(['id' => 60, 'name' => 'Turismo, cultura y región', 'center_id' => 11]);
        Line::create(['id' => 61, 'name' => 'Ciencias ambientales aplicadas: manejo ambiental, saneamiento y manejo de agua y aire y suelo', 'center_id' => 11]);

        //Sucre
        //Cesar

        Line::create(['id' => 62, 'name' => 'Biotecnología animal', 'center_id' => 12]);
        Line::create(['id' => 63, 'name' => 'Desarrollo agropecuario', 'center_id' => 12]);
        Line::create(['id' => 64, 'name' => 'Instalaciones eléctricas residenciales', 'center_id' => 12]);
        Line::create(['id' => 65, 'name' => 'Sistemas automáticos y de control industrial', 'center_id' => 12]);
        Line::create(['id' => 66, 'name' => 'Tecnología e Innovación agropecuarias', 'center_id' => 12]);

        //La Guajira

        Line::create(['id' => 67, 'name' => 'Ambiental', 'center_id' => 13]);
        Line::create(['id' => 68, 'name' => 'Automatización y Control', 'center_id' => 13]);
        Line::create(['id' => 69, 'name' => 'Cocina Tradicional Guajira', 'center_id' => 13]);
        Line::create(['id' => 70, 'name' => 'Construcciones del Futuro', 'center_id' => 13]);
        Line::create(['id' => 71, 'name' => 'Energias Renovables', 'center_id' => 13]);
        Line::create(['id' => 72, 'name' => 'Gestión Documental', 'center_id' => 13]);
        Line::create(['id' => 73, 'name' => 'Mercadeo y Venta', 'center_id' => 13]);
        Line::create(['id' => 74, 'name' => 'Sistemas, Telecomunicaciones y Electrónica (SisTeTronica)', 'center_id' => 13]);
        Line::create(['id' => 75, 'name' => 'Gerencia y Finanzas', 'center_id' => 13]);

        Line::create(['id' => 76, 'name' => 'Agroindustria', 'center_id' => 14]);
        Line::create(['id' => 77, 'name' => 'Agua y Saneamiento', 'center_id' => 14]);
        Line::create(['id' => 78, 'name' => 'Medio Ambiente', 'center_id' => 14]);
        Line::create(['id' => 79, 'name' => 'Biotecnología', 'center_id' => 14]);
        Line::create(['id' => 80, 'name' => 'Energías Limpias', 'center_id' => 14]);
        Line::create(['id' => 81, 'name' => 'Acuicultura y Agropecuaria', 'center_id' => 14]);

        //San Andres
    }
}
