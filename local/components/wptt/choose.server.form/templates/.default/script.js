// const inputsRadio = document.querySelector('.inputs-radio-mark').querySelectorAll('input[type="radio"]')
//
// console.log(123)
//
// inputsRadio.forEach(elem =>{
//     elem.addEventListener('click', ()=>{
//         if(elem.checked == true){
//             document.getElementById('radio-mark').innerText = elem.value
//         }
//     })
// } )

document.querySelectorAll('.solution-config__task-item').forEach(elem => {
    console.log(elem.getAttribute('id'))
    const titleId = elem.getAttribute('id')

    const optionInp = document.querySelector(`div[data-id='${titleId}']`)
    if (optionInp){

            optionInp.querySelectorAll('input').forEach(el =>{
                if(el){

                    el.addEventListener('click', ()=>{

                        elem.querySelector('span').innerText = el.value

                    })

                }
            })
            document.querySelectorAll('div[button-canche-input]').forEach(e =>{
                e.addEventListener('click', ()=>{
                    if(e.classList.contains('input-count__btn_lower')){
                        if(e.parentElement.getAttribute('data-id') == elem.getAttribute('id')){
                            elem.querySelector('span').innerText = +e.parentElement.querySelector('input').value - 1
                        }
                    }
                   else if(e.classList.contains('input-count__btn_uppper')){
                        if(e.parentElement.getAttribute('data-id') == elem.getAttribute('id')){
                            elem.querySelector('span').innerText = +e.parentElement.querySelector('input').value + 1
                        }
                    }


                })
            })
            optionInp.querySelectorAll('li').forEach(el =>{
                if(el){

                    el.addEventListener('click', ()=>{

                        elem.querySelector('span').innerText = el.textContent
                    })
                }
            })

    }


})