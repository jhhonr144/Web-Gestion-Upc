        $().ready(function() {
            $('#irarriba').hide();
            $("#detectascroll").on("click", function() {
                //scroll vertical
                var sv = $(document).scrollTop();
                //scroll horizontal
                var sh = $(document).scrollLeft();
                console.log("El scroll es: Vertical->", sv, " Horizontal->", sh);
                $(this).find("span").text("(" + sh + "," + sv + ")");
            });

            $("#scrollelemento").on("click", function() {
                var boton = $(this);
                var elemento = boton.parent();
                //scroll vertical
                var sv = elemento.scrollTop();
                //scroll horizontal
                var sh = elemento.scrollLeft();
                console.log("El scroll del elemento es: Vertical->", sv, " Horizontal->", sh);
                boton.find("span").text("(" + sh + "," + sv + ")");
            });

            $("#animarscroll").on("click", function() {
                var posicion = $("#hastaaqui").offset().top;
                $("html, body").animate({
                    scrollTop: posicion
                }, 2000);
            });

            $(document).on("scroll", function() {
                var desplazamientoActual = $(document).scrollTop();
                var controlArriba = $("#irarriba");
                console.log("Estoy en ", desplazamientoActual);
                if (desplazamientoActual > 110 && controlArriba.css("display") == "none") {
                    controlArriba.fadeIn(500);
                    $(".logoprincipal").fadeOut(800);
                }
                if (desplazamientoActual < 110 && controlArriba.css("display") == "block") {
                    controlArriba.fadeOut(500);
                    $(".logoprincipal").fadeIn(800);
                }
            });

            $("#irarriba").on("click", function(e) {
                e.preventDefault();
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        });