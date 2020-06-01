# Entrega 3 Grupo 23 - 50 BDD

En general la aplicación es bien intuitiva, y los accesos para cada solicitud son claros

## Logearse

Para logearse en la aplicación se debe ir a "Iniciar Sesion" e ingresar el "username" asignado del usuario, con su contraseña correspondiente. 
Para los usuarios de la base de datos entregada se les registró con una constraseña dummy, la que es "dummy".

## Funcionalidad adicional

- Buscador: según un input entrega artistas, obras, museos, iglesias, plazas y hoteles que cumplan con lo solicitado y su acceso directo de información

- Dinero gastado en la aplicación: en la página de "Mi perfil", entrega por usuario el detalle de cuanto ha gastado en la aplicación con su total.

- Devolver y cancelar compras: en la página de "Mi perfil", se pueden devolver tickets y entradas, y cancelar reservas, actualizando los datos. 
Esto no será posible para los tickets y reservas cuando la fecha de viaje y la fecha de inicio respectivamente coincidan con la fecha actual o sean anteriores a esta (Se mostrará como 'No Habilitado'). En otras palabras, solo se pueden devolver eventos futuros y, en el caso de los tickets, no se pueden devolver el mismo dia del viaje.
Por último, se asume que una entrada a un museo se puede usar en la fecha que uno desee, por lo que mientras no haya sido utilizada se podrá devolver.

- Páginas de listas obras y lugares: se presentan estas páginas para acceso rápido, se muestran de forma intuitiva en la barra de navegación. 

## Requerimientos entrega

- Se cumple con todos los requerimientos para esta entrega y se presentan de forma intuitiva mediante una barra de navegación

## Consideraciones

- La entrega 2 de los grupos 23 y 50 se encuentra anexada en esta entrega en la página "Preguntas Frecuentes", aludiendo a las consultas que debían entregarse.

- Si por algún motivo no llegase a funcionar la barra de navegación en la corrección, se habilitaron botones al final de la página index para poder acceder a las distintas páginas.

- **Bonus por imágenes:** se agregan las imágenes correspondientes en las páginas del artista, obra o lugar específico mediante la API de Bing, con la búsqueda de lo especificado entrega la primera imagen. El problema de esto, es que requiere una "key" para solicitar la imagen, la que utilizamos, pero por ser gratuita sólo tiene vigencia por 7 días. Favor de **probar la página y ver las imágenes antes de los 7 días** para cumplir con el bonus, ya que podemos hacerlo, pero para tener una key "infinita" es necesario pagarla. 
