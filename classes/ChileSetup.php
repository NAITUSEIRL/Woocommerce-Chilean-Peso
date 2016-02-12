<?php

/*
 * Esta clase se encarga de la instalación de las localidades de Chile.
 */

namespace CTala\Classes;

use CTala\Helpers\Logger;

class ChileSetup {

    private static $_tableName = "localidades_chile";

    function __construct() {
        
    }

    public static function crear_bdd_localidades_chile() {
        Logger::log_me("Ingresando a la Creacion de Localidades Chile", __CLASS__);
        global $wpdb;
        $table_name = $wpdb->prefix . self::$_tableName;
        $sql = "CREATE TABLE $table_name (
        id int (11) NOT NULL AUTO_INCREMENT,
		country_name varchar(255) NOT NULL,
		state_code varchar(255) NOT NULL,
		name_state varchar(255) NOT NULL,
		name_city varchar(255) NOT NULL,
        PRIMARY KEY  (id)
        );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $resultado = dbDelta($sql);
        Logger::log_me($resultado, __CLASS__);
        Logger::log_me("Finalizando la creación de la tabla", __CLASS__);
    }

    public static function insertar_datos_localidades_chile() {
        global $wpdb;
        $table_name = $wpdb->prefix . self::$_tableName;

        $sql = "INSERT INTO " . $table_name . " (country_name, state_code, name_state, name_city) VALUES           
            ('CL','XV','Arica and Parinacota','Camarones'),
            ('CL','XV','Arica and Parinacota','Arica'),
            ('CL','XV','Arica and Parinacota','Putre'),
            ('CL','XV','Arica and Parinacota','General Lagos'),
            ('CL','CL-TA','Tarapacá','Iquique'),
            ('CL','CL-TA','Tarapacá','Alto Hospicio'),
            ('CL','CL-TA','Tarapacá','Pozo Almonte'),
            ('CL','CL-TA','Tarapacá','Pica'),
            ('CL','CL-TA','Tarapacá','Huara'),
            ('CL','CL-TA','Tarapacá','Colchane'),
            ('CL','CL-TA','Tarapacá','Camiña'),
            ('CL','CL-AN','Antofagasta','Taltal'),
            ('CL','CL-AN','Antofagasta','Sierra Gorda'),
            ('CL','CL-AN','Antofagasta','Mejillones'),
            ('CL','CL-AN','Antofagasta','Antofagasta'),
            ('CL','CL-AN','Antofagasta','San Pedro de Atacama'),
            ('CL','CL-AN','Antofagasta','Ollagüe'),
            ('CL','CL-AN','Antofagasta','Calama'),
            ('CL','CL-AN','Antofagasta','Tocopilla'),
            ('CL','CL-AN','Antofagasta','María Elena'),
            ('CL','CL-AT','Atacama','Diego de Almagro'),
            ('CL','CL-AT','Atacama','Chañaral'),
            ('CL','CL-AT','Atacama','Tierra Amarilla'),
            ('CL','CL-AT','Atacama','Copiapó'),
            ('CL','CL-AT','Atacama','Caldera'),
            ('CL','CL-AT','Atacama','Vallenar'),
            ('CL','CL-AT','Atacama','Huasco'),
            ('CL','CL-AT','Atacama','Freirina'),
            ('CL','CL-AT','Atacama','Alto del Carmen'),
            ('CL','CL-CO','Coquimbo','Salamanca'),
            ('CL','CL-CO','Coquimbo','Los Vilos'),
            ('CL','CL-CO','Coquimbo','Illapel'),
            ('CL','CL-CO','Coquimbo','Canela'),
            ('CL','CL-CO','Coquimbo','Vicuña'),
            ('CL','CL-CO','Coquimbo','Paiguano'),
            ('CL','CL-CO','Coquimbo','La Serena'),
            ('CL','CL-CO','Coquimbo','La Higuera'),
            ('CL','CL-CO','Coquimbo','Coquimbo'),
            ('CL','CL-CO','Coquimbo','Andacollo'),
            ('CL','CL-CO','Coquimbo','Río Hurtado'),
            ('CL','CL-CO','Coquimbo','Punitaqui'),
            ('CL','CL-CO','Coquimbo','Ovalle'),
            ('CL','CL-CO','Coquimbo','Monte Patria'),
            ('CL','CL-CO','Coquimbo','Combarbalá'),
            ('CL','CL-VS','Valparaíso','Isla de Pascua'),
            ('CL','CL-VS','Valparaíso','San Esteban'),
            ('CL','CL-VS','Valparaíso','Rinconada'),
            ('CL','CL-VS','Valparaíso','Los Andes'),
            ('CL','CL-VS','Valparaíso','Calle Larga'),
            ('CL','CL-VS','Valparaíso','Villa Alemana'),
            ('CL','CL-VS','Valparaíso','Quilpué'),
            ('CL','CL-VS','Valparaíso','Limache'),
            ('CL','CL-VS','Valparaíso','Olmué'),
            ('CL','CL-VS','Valparaíso','Zapallar'),
            ('CL','CL-VS','Valparaíso','Petorca'),
            ('CL','CL-VS','Valparaíso','Papudo'),
            ('CL','CL-VS','Valparaíso','La Ligua'),
            ('CL','CL-VS','Valparaíso','Cabildo'),
            ('CL','CL-VS','Valparaíso','Quillota'),
            ('CL','CL-VS','Valparaíso','Nogales'),
            ('CL','CL-VS','Valparaíso','La Cruz'),
            ('CL','CL-VS','Valparaíso','La Calera'),
            ('CL','CL-VS','Valparaíso','Hijuelas'),
            ('CL','CL-VS','Valparaíso','Santo Domingo'),
            ('CL','CL-VS','Valparaíso','San Antonio'),
            ('CL','CL-VS','Valparaíso','El Tabo'),
            ('CL','CL-VS','Valparaíso','El Quisco'),
            ('CL','CL-VS','Valparaíso','Cartagena'),
            ('CL','CL-VS','Valparaíso','Algarrobo'),
            ('CL','CL-VS','Valparaíso','Santa María'),
            ('CL','CL-VS','Valparaíso','San Felipe'),
            ('CL','CL-VS','Valparaíso','Putaendo'),
            ('CL','CL-VS','Valparaíso','Panquehue'),
            ('CL','CL-VS','Valparaíso','Llaillay'),
            ('CL','CL-VS','Valparaíso','Catemu'),
            ('CL','CL-VS','Valparaíso','Viña del Mar'),
            ('CL','CL-VS','Valparaíso','Valparaíso'),
            ('CL','CL-VS','Valparaíso','Quintero'),
            ('CL','CL-VS','Valparaíso','Puchuncaví'),
            ('CL','CL-VS','Valparaíso','Concón'),
            ('CL','CL-VS','Valparaíso','Juan Fernández'),
            ('CL','CL-VS','Valparaíso','Casablanca'),
            ('CL','RM','Metropolitana','Tiltil'),
            ('CL','RM','Metropolitana','Lampa'),
            ('CL','RM','Metropolitana','Colina'),
            ('CL','RM','Metropolitana','San José de Maipo'),
            ('CL','RM','Metropolitana','Puente Alto'),
            ('CL','RM','Metropolitana','Pirque'),
            ('CL','RM','Metropolitana','San Bernardo'),
            ('CL','RM','Metropolitana','Paine'),
            ('CL','RM','Metropolitana','Calera de Tango'),
            ('CL','RM','Metropolitana','Buin'),
            ('CL','RM','Metropolitana','San Pedro'),
            ('CL','RM','Metropolitana','Melipilla'),
            ('CL','RM','Metropolitana','María Pinto'),
            ('CL','RM','Metropolitana','Curacaví'),
            ('CL','RM','Metropolitana','Alhué'),
            ('CL','RM','Metropolitana','Vitacura'),
            ('CL','RM','Metropolitana','Santiago'),
            ('CL','RM','Metropolitana','San Ramón'),
            ('CL','RM','Metropolitana','San Miguel'),
            ('CL','RM','Metropolitana','San Joaquín'),
            ('CL','RM','Metropolitana','Renca'),
            ('CL','RM','Metropolitana','Recoleta'),
            ('CL','RM','Metropolitana','Quinta Normal'),
            ('CL','RM','Metropolitana','Quilicura'),
            ('CL','RM','Metropolitana','Pudahuel'),
            ('CL','RM','Metropolitana','Providencia'),
            ('CL','RM','Metropolitana','Peñalolén'),
            ('CL','RM','Metropolitana','Pedro Aguirre Cerda'),
            ('CL','RM','Metropolitana','Ñuñoa'),
            ('CL','RM','Metropolitana','Maipú'),
            ('CL','RM','Metropolitana','Macul'),
            ('CL','RM','Metropolitana','Lo Prado'),
            ('CL','RM','Metropolitana','Lo Espejo'),
            ('CL','RM','Metropolitana','Lo Barnechea'),
            ('CL','RM','Metropolitana','Las Condes'),
            ('CL','RM','Metropolitana','La Reina'),
            ('CL','RM','Metropolitana','La Pintana'),
            ('CL','RM','Metropolitana','La Granja'),
            ('CL','RM','Metropolitana','La Florida'),
            ('CL','RM','Metropolitana','La Cisterna'),
            ('CL','RM','Metropolitana','Independencia'),
            ('CL','RM','Metropolitana','Huechuraba'),
            ('CL','RM','Metropolitana','Estación Central'),
            ('CL','RM','Metropolitana','El Bosque'),
            ('CL','RM','Metropolitana','Conchalí'),
            ('CL','RM','Metropolitana','Cerro Navia'),
            ('CL','RM','Metropolitana','Cerrillos'),
            ('CL','RM','Metropolitana','Talagante'),
            ('CL','RM','Metropolitana','Peñaflor'),
            ('CL','RM','Metropolitana','Padre Hurtado'),
            ('CL','RM','Metropolitana','Isla de Maipo'),
            ('CL','RM','Metropolitana','El Monte'),
            ('CL','VI','OHiggins','San Vicente'),
            ('CL','VI','OHiggins','Requínoa'),
            ('CL','VI','OHiggins','Rengo'),
            ('CL','VI','OHiggins','Rancagua'),
            ('CL','VI','OHiggins','Quinta de Tilcoco'),
            ('CL','VI','OHiggins','Pichidegua'),
            ('CL','VI','OHiggins','Peumo'),
            ('CL','VI','OHiggins','Olivar'),
            ('CL','VI','OHiggins','Mostazal'),
            ('CL','VI','OHiggins','Malloa'),
            ('CL','VI','OHiggins','Machalí'),
            ('CL','VI','OHiggins','Las Cabras'),
            ('CL','VI','OHiggins','Graneros'),
            ('CL','VI','OHiggins','Donihue'),
            ('CL','VI','OHiggins','Coltauco'),
            ('CL','VI','OHiggins','Coinco'),
            ('CL','VI','OHiggins','Codegua'),
            ('CL','VI','OHiggins','Pichilemu'),
            ('CL','VI','OHiggins','Paredones'),
            ('CL','VI','OHiggins','Navidad'),
            ('CL','VI','OHiggins','Marchihue'),
            ('CL','VI','OHiggins','Litueche'),
            ('CL','VI','OHiggins','La Estrella'),
            ('CL','VI','OHiggins','Santa Cruz'),
            ('CL','VI','OHiggins','San Fernando'),
            ('CL','VI','OHiggins','Pumanque'),
            ('CL','VI','OHiggins','Placilla'),
            ('CL','VI','OHiggins','Peralillo'),
            ('CL','VI','OHiggins','Palmilla'),
            ('CL','VI','OHiggins','Nancagua'),
            ('CL','VI','OHiggins','Lolol'),
            ('CL','VI','OHiggins','Chimbarongo'),
            ('CL','VI','OHiggins','Chépica'),
            ('CL','VII','Maule','Pelluhue'),
            ('CL','VII','Maule','Chanco'),
            ('CL','VII','Maule','Cauquenes'),
            ('CL','VII','Maule','Vichuquén'),
            ('CL','VII','Maule','Teno'),
            ('CL','VII','Maule','Sagrada Familia'),
            ('CL','VII','Maule','Romeral'),
            ('CL','VII','Maule','Rauco'),
            ('CL','VII','Maule','Molina'),
            ('CL','VII','Maule','Licantén'),
            ('CL','VII','Maule','Hualañé'),
            ('CL','VII','Maule','Curicó'),
            ('CL','VII','Maule','Yerbas Buenas'),
            ('CL','VII','Maule','Villa Alegre'),
            ('CL','VII','Maule','San Javier'),
            ('CL','VII','Maule','Retiro'),
            ('CL','VII','Maule','Parral'),
            ('CL','VII','Maule','Longaví'),
            ('CL','VII','Maule','Linares'),
            ('CL','VII','Maule','Colbún'),
            ('CL','VII','Maule','Talca'),
            ('CL','VII','Maule','San Rafael'),
            ('CL','VII','Maule','San Clemente'),
            ('CL','VII','Maule','Río Claro'),
            ('CL','VII','Maule','Pencahue'),
            ('CL','VII','Maule','Pelarco'),
            ('CL','VII','Maule','Maule'),
            ('CL','VII','Maule','Empedrado'),
            ('CL','VII','Maule','Curepto'),
            ('CL','VII','Maule','Constitución'),
            ('CL','VIII','Biobío','Tirúa'),
            ('CL','VIII','Biobío','Los Álamos'),
            ('CL','VIII','Biobío','Lebu'),
            ('CL','VIII','Biobío','Curanilahue'),
            ('CL','VIII','Biobío','Contulmo'),
            ('CL','VIII','Biobío','Cañete'),
            ('CL','VIII','Biobío','Arauco'),
            ('CL','VIII','Biobío','Yumbel'),
            ('CL','VIII','Biobío','Tucapel'),
            ('CL','VIII','Biobío','Santa Bárbara'),
            ('CL','VIII','Biobío','San Rosendo'),
            ('CL','VIII','Biobío','Quilleco'),
            ('CL','VIII','Biobío','Quilaco'),
            ('CL','VIII','Biobío','Negrete'),
            ('CL','VIII','Biobío','Nacimiento'),
            ('CL','VIII','Biobío','Mulchén'),
            ('CL','VIII','Biobío','Los Ángeles'),
            ('CL','VIII','Biobío','Laja'),
            ('CL','VIII','Biobío','Cabrero'),
            ('CL','VIII','Biobío','Antuco'),
            ('CL','VIII','Biobío','Alto Biobío'),
            ('CL','VIII','Biobío','Tomé'),
            ('CL','VIII','Biobío','Talcahuano'),
            ('CL','VIII','Biobío','Santa Juana'),
            ('CL','VIII','Biobío','San Pedro de la Paz'),
            ('CL','VIII','Biobío','Penco'),
            ('CL','VIII','Biobío','Lota'),
            ('CL','VIII','Biobío','Hualqui'),
            ('CL','VIII','Biobío','Hualpén'),
            ('CL','VIII','Biobío','Florida'),
            ('CL','VIII','Biobío','Coronel'),
            ('CL','VIII','Biobío','Concepción'),
            ('CL','VIII','Biobío','Chiguayante'),
            ('CL','VIII','Biobío','Yungay'),
            ('CL','VIII','Biobío','Treguaco'),
            ('CL','VIII','Biobío','San Nicolás'),
            ('CL','VIII','Biobío','San Ignacio'),
            ('CL','VIII','Biobío','San Fabián'),
            ('CL','VIII','Biobío','San Carlos'),
            ('CL','VIII','Biobío','Ránquil'),
            ('CL','VIII','Biobío','Quirihue'),
            ('CL','VIII','Biobío','Quillón'),
            ('CL','VIII','Biobío','Portezuelo'),
            ('CL','VIII','Biobío','Pinto'),
            ('CL','VIII','Biobío','Pemuco'),
            ('CL','VIII','Biobío','Ñiquén'),
            ('CL','VIII','Biobío','Ninhue'),
            ('CL','VIII','Biobío','El Carmen'),
            ('CL','VIII','Biobío','Coihueco'),
            ('CL','VIII','Biobío','Coelemu'),
            ('CL','VIII','Biobío','Cobquecura'),
            ('CL','VIII','Biobío','Chillán Viejo'),
            ('CL','VIII','Biobío','Chillán'),
            ('CL','VIII','Biobío','Bulnes'),
            ('CL','IX','Araucanía','Villarrica'),
            ('CL','IX','Araucanía','Vilcún'),
            ('CL','IX','Araucanía','Toltén'),
            ('CL','IX','Araucanía','Teodoro Schmidt'),
            ('CL','IX','Araucanía','Temuco'),
            ('CL','IX','Araucanía','Saavedra'),
            ('CL','IX','Araucanía','Pucón'),
            ('CL','IX','Araucanía','Pitrufquén'),
            ('CL','IX','Araucanía','Perquenco'),
            ('CL','IX','Araucanía','Padre Las Casas'),
            ('CL','IX','Araucanía','Nueva Imperial'),
            ('CL','IX','Araucanía','Melipeuco'),
            ('CL','IX','Araucanía','Loncoche'),
            ('CL','IX','Araucanía','Lautaro'),
            ('CL','IX','Araucanía','Gorbea'),
            ('CL','IX','Araucanía','Galvarino'),
            ('CL','IX','Araucanía','Freire'),
            ('CL','IX','Araucanía','Curarrehue'),
            ('CL','IX','Araucanía','Cunco'),
            ('CL','IX','Araucanía','Cholchol'),
            ('CL','IX','Araucanía','Carahue'),
            ('CL','IX','Araucanía','Victoria'),
            ('CL','IX','Araucanía','Traiguén'),
            ('CL','IX','Araucanía','Renaico'),
            ('CL','IX','Araucanía','Purén'),
            ('CL','IX','Araucanía','Lumaco'),
            ('CL','IX','Araucanía','Los Sauces'),
            ('CL','IX','Araucanía','Lonquimay'),
            ('CL','IX','Araucanía','Ercilla'),
            ('CL','IX','Araucanía','Curacautín'),
            ('CL','IX','Araucanía','Collipulli'),
            ('CL','IX','Araucanía','Angol'),
            ('CL','XIV','Los Ríos','Río Bueno'),
            ('CL','XIV','Los Ríos','Lago Ranco'),
            ('CL','XIV','Los Ríos','La Unión'),
            ('CL','XIV','Los Ríos','Futrono'),
            ('CL','XIV','Los Ríos','Valdivia'),
            ('CL','XIV','Los Ríos','Panguipulli'),
            ('CL','XIV','Los Ríos','Paillaco'),
            ('CL','XIV','Los Ríos','San José de la Mariquina'),
            ('CL','XIV','Los Ríos','Máfil'),
            ('CL','XIV','Los Ríos','Los Lagos'),
            ('CL','XIV','Los Ríos','Lanco'),
            ('CL','XIV','Los Ríos','Corral'),
            ('CL','X','Los Lagos','Quinchao'),
            ('CL','X','Los Lagos','Quemchi'),
            ('CL','X','Los Lagos','Quellón'),
            ('CL','X','Los Lagos','Queilén'),
            ('CL','X','Los Lagos','Puqueldón'),
            ('CL','X','Los Lagos','Dalcahue'),
            ('CL','X','Los Lagos','Curaco de Vélez'),
            ('CL','X','Los Lagos','Chonchi'),
            ('CL','X','Los Lagos','Castro'),
            ('CL','X','Los Lagos','Ancud'),
            ('CL','X','Los Lagos','Puerto Varas'),
            ('CL','X','Los Lagos','Puerto Montt'),
            ('CL','X','Los Lagos','Maullín'),
            ('CL','X','Los Lagos','Los Muermos'),
            ('CL','X','Los Lagos','Llanquihue'),
            ('CL','X','Los Lagos','Frutillar'),
            ('CL','X','Los Lagos','Fresia'),
            ('CL','X','Los Lagos','Cochamó'),
            ('CL','X','Los Lagos','Calbuco'),
            ('CL','X','Los Lagos','San Pablo'),
            ('CL','X','Los Lagos','San Juan de la Costa'),
            ('CL','X','Los Lagos','Río Negro'),
            ('CL','X','Los Lagos','Puyehue'),
            ('CL','X','Los Lagos','Purranque'),
            ('CL','X','Los Lagos','Puerto Octay'),
            ('CL','X','Los Lagos','Osorno'),
            ('CL','X','Los Lagos','Palena'),
            ('CL','X','Los Lagos','Hualaihué'),
            ('CL','X','Los Lagos','Futaleufú'),
            ('CL','X','Los Lagos','Chaitén'),
            ('CL','XI','Aisén','Guaitecas'),
            ('CL','XI','Aisén','Cisnes'),
            ('CL','XI','Aisén','Aisén'),
            ('CL','XI','Aisén','Tortel'),
            ('CL','XI','Aisén','OHiggins'),
            ('CL','XI','Aisén','Cochrane'),
            ('CL','XI','Aisén','Lago Verde'),
            ('CL','XI','Aisén','Coihaique'),
            ('CL','XI','Aisén','Río Ibáñez'),
            ('CL','XI','Aisén','Chile Chico'),
            ('CL','XII','Magallanes and Antártica Chilena','Cabo de Hornos'),
            ('CL','XII','Magallanes and Antártica Chilena','Antártica'),
            ('CL','XII','Magallanes and Antártica Chilena','San Gregorio'),
            ('CL','XII','Magallanes and Antártica Chilena','Río Verde'),
            ('CL','XII','Magallanes and Antártica Chilena','Punta Arenas'),
            ('CL','XII','Magallanes and Antártica Chilena','Laguna Blanca'),
            ('CL','XII','Magallanes and Antártica Chilena','Timaukel'),
            ('CL','XII','Magallanes and Antártica Chilena','Primavera'),
            ('CL','XII','Magallanes and Antártica Chilena','Porvenir'),
            ('CL','XII','Magallanes and Antártica Chilena','Torres del Paine'),
            ('CL','XII','Magallanes and Antártica Chilena','Natales')";


        /*
         * Para no agregar dos veces
         */
        $country = "SELECT * FROM " . $table_name;

        $GetAllState = $wpdb->get_results($country);

        if ($GetAllState) {
            $rowCount = $GetAllState->num_rows;
        } else {
            $rowCount = 0;
        }


        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        if ($rowCount < 1) {
            dbDelta($sql);
        }
    }

}
