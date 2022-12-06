/*
  Creación de una función personalizada para jQuery que detecta cuando se detiene el scroll en la página
*/
$.fn.scrollEnd = function(callback, timeout) {
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
/*
  Función que inicializa el elemento Slider
*/

function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,
    prefix: "$"
  });
}

$(document).ready(function () {
    //$("select").material_select();
    $('#selectCiudad').material_select();
    $('#selectTipo').material_select();
});

/*
  Función que reproduce el video de fondo al hacer scroll, y deteiene la reproducción al detener el scroll

function playVideoOnScroll(){
  var ultimoScroll = 0,
      intervalRewind;
  var video = document.getElementById('vidFondo');
  $(window)
    .scroll((event)=>{
      var scrollActual = $(window).scrollTop();
      if (scrollActual > ultimoScroll){
       video.play();
     } else {
        //this.rewind(1.0, video, intervalRewind);
        video.play();
     }
     ultimoScroll = scrollActual;
    })
    .scrollEnd(()=>{
      video.pause();
    }, 10)
}
*/
$('#mostrarTodos').on('click', () => {
    $.ajax({
        url: 'http://localhost/BigDataBackend_PHP_Henry_Montano/data-1.json',
        success: (response) => {

            $.each(response, (index, element) => {
                $('#itemProducto').append('<div class="card horizontal itemMostrado">\n' +
                    '            <img src="img/home.jpg">\n' +
                    '            <div class="card-stacked">\n' +
                    '                <div class="card-content">\n' +
                    '                    <ul>\n' +
                    '                        <li><b>Direccion:</b> ' + element.Direccion + ' </li>\n' +
                    '                        <li><b>Ciudad:</b> ' + element.Ciudad + ' </li>\n' +
                    '                        <li><b>Telefono:</b> ' + element.Telefono + ' </li>\n' +
                    '                        <li><b>Codigo postal:</b> ' + element.Codigo_Postal + ' </li>\n' +
                    '                        <li><b>Tipo:</b> ' + element.Tipo + ' </li>\n' +
                    '                        <li><b>Precio:</b> <span class="precioTexto"> ' + element.Precio + ' </span> </li>\n' +
                    '                    </ul>\n' +
                    '                </div>\n' +
                    '                <div class="card-action">\n' +
                    '                    <a href="https://www.google.com" target="_blank">Ver Mas</a>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '        </div>'
                );
            });
        }
    })
});

$('#submitButton').on('click',() => {
    $.ajax({
        url: 'http://localhost/BigDataBackend_PHP_Henry_Montano/search.php',
        method: 'GET',
        success: (response) => {
            console.log(response);
        }
    })
});

function cargarSelects(){
    $.ajax({
        url: 'http://localhost/BigDataBackend_PHP_Henry_Montano/data-1.json',
        success: (response) => {
            let ciudadesMap = response.map(item=>{
                return [item.Ciudad,item]
            });
            var ciudadesMapArr = new Map(ciudadesMap); // Pares de clave y valor

            let unicos = [...ciudadesMapArr.values()]; // Conversión a un array

            $.each(unicos, (index, element) => {
                $('#selectCiudad').append('<option value="'+ element.Ciudad +'">'+ element.Ciudad +'</option>');
            })

            let tiposMap = response.map(item=>{
                return [item.Tipo,item]
            });
            var tiposMapArr = new Map(tiposMap); // Pares de clave y valor

            let tipos = [...tiposMapArr.values()]; // Conversión a un array

            $.each(tipos, (index, element) => {
                $('#selectTipo').append('<option value="'+ element.Tipo +'">'+ element.Tipo +'</option>');
            })
        }
    });
}

/*
$('#mostrarTodos').click(function () {
    alert('Hola mundo!');
});
*/
cargarSelects();
inicializarSlider();
//playVideoOnScroll();
