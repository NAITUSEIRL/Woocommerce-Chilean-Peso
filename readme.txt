=== WooCommerce Chilean Peso  ===

Contributors: Cristian Tala S.



Tags: 

Requires at least: 3, 3.3+ and WooCommerce 1.4+, Chilean Peso, Pesos Chilenos, currency

Tested up to: 4.4

Stable tag: 2.5.12.2

== Description ==

This Small Plugin add The Chilean Peso currency and symbol to woocommerce.
Add the different states to Woocommerce.
Enable the paypal payment through CLP to USD conversion.
Disables the postal code as required.

Lo que hace este plugin es facilitar la integración de los pesos Chilenos a Woocommerce, además de agregar las distintas regiones del país ( Chile obviamente ) y aceptar pagos con paypal a través de dolares. 

Si se requiere usar el valor actualizado del dolar es necesario crear un api en https://openexchangerates.org/ y agregarla a la configuracion del plugin.

La Configuracion del plugin se puede encontrar en el menu de settings bajo el nombre de Chilean Peso

Deshabilita el código postal por ahora, debido a que en Chile aún no acostumbramos a utilizarlo.

== TODO ==

== Changelog ==

= 2.5.12.2 = 

* Se agrega validacion de que el codigo del api de OpenXChange exista antes de crear el objeto.
* Se valida que las variables existan antes de preguntar por ellas.

= 2.5.12.1 =
Actualizado el 14 de Diciembre del 2015

* Se agrega nuevo repositorio oficial en github
* Se arregla problema en el cobro de impuestos cuando estos no están incluidos con Paypal. ( Gracias a Juan Pablo Oyarzun)
* Se agrega WIKI
* Se agrega Menú para configuración
* Se agrega código para usar el API de OpenExchange
* Se agrega la opción de usar el valor fijo para el dolar.

= 2.5.5 =

Actualizado el 5 de Junio del 2015

 * Se baja el tiempo del caché.
 * Se actualiza el valor del dolar por defecto a 630.

= 2.5 =

* Conexión a OpenExchange Rates para tener el valor del dolar actualizado.
* Se hace cache del valor del dolar para ahorrar consultas.

= 2.4 =

* Se deshabilita el código postal como obligatorio.

= 2.2 =
* Agregada la posibilidad de usar paypal con woocommerce y chilean pesos.

= 2.0 =
* Added the Chilean states for WooCommerce
* Agregadas las Regiones de Chile a WooCommerce
