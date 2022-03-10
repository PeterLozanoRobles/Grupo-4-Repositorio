window.addEventListener('load', ()=> {
    const form = document.querySelector('#formulario')
    const letra = document.getElementById('letra')
    const telefono = document.getElementById('telefono')
    const numero = document.getElementById('numero')
    const email = document.getElementById('email')
    const pass = document.getElementById('pass')
    const passConfirma = document.getElementById('passConfirma')

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        validaCampos()
    })
    
    const validaCampos = ()=> {
        //capturar los valores ingresados por el usuario
        const letra = letra.value.trim()
        const numero = numero.value.trim()
        const telefono = telefono.value.trim()
        const emailValor = email.value.trim()
        const passValor = pass.value.trim()
        const passConfirmaValor = passConfirma.value.trim();
     
        //validando campo usuario
        //(!usuarioValor) ? console.log('CAMPO VACIO') : console.log(usuarioValor)
        if(!letra){
            //console.log('CAMPO VACIO')
            validaFalla(letra, 'Campo vacÃ­o')
        }else{
            validaOk(letra)
        }
        
        //numero
        if(!numero){
            //console.log('CAMPO VACIO')
            validaFalla(numero, 'Campo vacÃ­o')
        }else{
            validaOk(numero)
        }

        //validando campo email
        if(!emailValor){
            validaFalla(email, 'Campo vacÃ­o')            
        }else if(!validaEmail(emailValor)) {
            validaFalla(email, 'El e-mail no es vÃ¡lido')
        }else {
            validaOk(email)
        }
         //validando campo password
         const er = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/          
         if(!passValor) {
             validaFalla(pass, 'Campo vacÃ­o')
         } else if (passValor.length < 8) {             
             validaFalla(pass, 'Debe tener 8 caracteres cÃ³mo mÃ­nimo.')
         } else if (!passValor.match(er)) {
             validaFalla(pass, 'Debe tener al menos una may., una min. y un nÃºm.')
         } else {
             validaOk(pass)
         }

         //validando campo password ConfirmaciÃ³n
         if(!passConfirmaValor){
             validaFalla(passConfirma, 'Confirme su password')
         } else if(passValor !== passConfirmaValor) {
             validaFalla(passConfirma, 'La password no coincide')
         } else {
             validaOk(passConfirma)
         }


    }

    const validaFalla = (input, msje) => {
        const formControl = input.parentElement
        const aviso = formControl.querySelector('p')
        aviso.innerText = msje

        formControl.className = 'form-control falla'
    }
    const validaOk = (input, msje) => {
        const formControl = input.parentElement
        formControl.className = 'form-control ok'
    }

    const validaEmail = (email) => {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);        
    }

})

