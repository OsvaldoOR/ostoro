(function(){
    $(document).ready(function(){
        $('.alt-form').click(function(){
            $('.form-content').animate({
                height: "toggle",
                opacity: 'toggle'
            }, 600);
        });

        let formRegistro = document.getElementsByName('form-input');
        for (let i = 0; i < formRegistro.length; i++) {
            formRegistro[i].addEventListener('blur', function(){
                if (this.value.length >= 1) {
                    this.nextElementSibling.classList.add('active');
                    this.nextElementSibling.classList.remove('error');
                } else if (this.value.length = " ") {
                    this.nextElementSibling.classList.add('error');
                    this.nextElementSibling.classList.remove('active');
                } else {
                    this.nextElementSibling.classList.remove('active');
                }
            })
        }
        
        $('#iniciarsesion').click(function(){
            var vcorreo = $('#correo').val();
            var vpass = $('#pass').val();

            if(vcorreo == 'sergioosto999@gmail.com' && vpass == '1234')
            {
                
                alert( "inicio de sesion correcto");
            }
            else
            {
                alert( "inicio de sesion incorrecto" );
            }
            
        });


    })

}())