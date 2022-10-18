
// Call the dataTables jQuery plugin
$(document).ready(function(){
  $('#dataTable').DataTable({
    "searching": false,
    "order": [[0, "asc"]],
    "language":{
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
      "info": "Mostrando pagina _PAGE_ de _PAGES_",
      "infoEmpty": "No hay registros disponibles",
      "infoFiltered": "(filtrada de _MAX_ registros)",
      "loadingRecords": "Cargando...",
      "processing":     "Procesando...",
      "search": "Buscar:",
      "zeroRecords":    "No se encontraron registros coincidentes en la consulta",
      "paginate": {
        "next":       "Siguiente",
        "previous":   "Anterior"
      },		
    }
  });	
});	

var filterByName = function(column, name) {
  $.fn.dataTableExt.afnFiltering.push(
     function( oSettings, aData, iDataIndex ) {
        var rowName = aData[column]; //Aqui obtienes el valor de la columna.
      //Y comparas si son iguales.
        if(rowName == name){
           return true;
        }
     }
  );
};

$('#filtrar').on('click', function(e){
  e.preventDefault();
  var name = $("#nombre").val(); //Guardas el valor del input


  filterByName(2, name); //0 es la columna, imaginando el la primera columna es nombre la dejas en 0 y envias name que es lo que ingresaste
  $dataTable = $('#dataTable').DataTable();
  $dataTable.dataTable().fnDraw();
});

/*
$( '#btnbuscar' ).click(function() {
  $.ajax({
      url: json_encode($_SERVER['PHP_SELF']),
      method: 'post',
      data: {
          data: $( '#texto' ).val(),
      },
  }).done(function( datos ) {
      /* Mostramos el resultado de agregar los datos */
      //$( '#resultado' ).text(datos);
      /* Limpiamos el campo de texto del formulario y colocamos el foco allí de nuevo */
      //$( '#texto' ).val('').focus();
      /* Solicitamos al servidor que nos envíe los datos almacenados en la variable de sesión */
      /*$.ajax({
          url: json_encode($_SERVER['PHP_SELF']),
          method: 'get',
          data: {
              actualizar: true,
          },
      }).done(function( datos, resultado, xhr ) {
          /* Mostramos el contenido de la variable de sesión tal y como nos la envía el PHP */
          //$( '#datos' ).text(xhr.responseText);
          /* Por consola muestro los datos nativos de javascript */
         /* console.log(datos);
      });
  });
});*/

function textBox(){
  var name = $("#nombre").val(); //Guardas el valor del input
  setTimeout(() => {
    document.getElementById('nombre').value = name;
  }, 5000);
}

function guardar(idProducto,codProducto,nomProducto,stockProdcuto,preUniProducto,idAdmin,idProveedor){
        
  console.log(idProducto);
  document.getElementById('inputCode1').value = codProducto;
  document.getElementById('inputName1').value = nomProducto;
  document.getElementById('inputPrice1').value = stockProdcuto;
  document.getElementById('inputStock1').value = preUniProducto;
  document.getElementById('id_admin1').value = idAdmin;
  document.getElementById('id_prov1').value = idProveedor;
}