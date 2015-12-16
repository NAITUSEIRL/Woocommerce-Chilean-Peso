# Woocommerce-Chilean-Peso
Actualmente es más que solo agregar el peso chileno y las regiones, la idea es que este plugin se convierta en un toolbox para las venats de eCommerce en Chile.

## Introducción
Lo que hace este plugin es facilitar la integración de los pesos Chilenos a Woocommerce, además de agregar las distintas regiones del país ( Chile obviamente ) y aceptar pagos con paypal a través de dolares.
Deshabilita el código postal por ahora, debido a que en Chile aún no acostumbramos a utilizarlo.

## Changelog

### 2.5.12.2
* Se agrega validacion de que el codigo del api de OpenXChange exista antes de crear el objeto.
* Se valida que las variables existan antes de preguntar por ellas.

### 2.5.12.1

Actualizado el 14 de Diciembre del 2015

* Se agrega nuevo repositorio oficial en github
* Se arregla problema en el cobro de impuestos cuando estos no están incluidos con Paypal. ( Gracias a Juan Pablo Oyarzun )
* Se agrega WIKI
* Se agrega Menú para configuración
* Se agrega código para usar el API de OpenExchange
* Se agrega la opción de usar el valor fijo para el dolar.

### 2.5
* Conexión a OpenExchange Rates para tener el valor del dolar actualizado.
* Se hace cache del valor del dolar para ahorrar consultas.

### 2.4
* Se deshabilita el código postal como obligatorio.

### 2.2

* Agregada la posibilidad de usar paypal con woocommerce y chilean pesos.

### 2.0
* Added the Chilean states for WooCommerce
* Agregadas las Regiones de Chile a WooCommerc


### TODO
