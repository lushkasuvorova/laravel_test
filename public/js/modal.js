document.addEventListener("DOMContentLoaded", () => {
    const createModalEl = document.getElementById('modalCreate')
    if (createModalEl) {
        createModalEl.addEventListener('show.bs.modal', event => {
            window.count_atributes = 1
        })
        createModalEl.addEventListener('hide.bs.modal', event => {

            for (i = 1; i <= window.count_atributes; i++) {
                let delAtribute = document.getElementById('atr' + i)
                if (delAtribute) delAtribute.remove()
            }
            window.count_atributes = 0
        })
    }
    const edits = document.querySelectorAll('.edit');
    for (let i = 0; i < edits.length; i++) {

        edits[i].addEventListener('show.bs.modal', event => {
            let Atributes = edits[i].querySelectorAll('.oldAtribut');
            window.count_atributes = Atributes.length + 1
            
        })

        edits[i].addEventListener('hide.bs.modal', event => {
            const oldAtributes = edits[i].querySelectorAll('.oldAtribut')
            oldAtributes.forEach((Atribute) => {
                if (Atribute.style.display = 'none') {
                    Atribute.style.display = 'block'
                    let Inputs = Atribute.querySelectorAll('Input')
                    Inputs.forEach((Input) => {
                        Input.name = 'data->' + Input.name
                    })
                }
            })

            const newAtributes = edits[i].querySelectorAll('.newAtribut')
            newAtributes.forEach((Atribute) => {
                Atribute.remove()
            })
            window.count_atributes = 0
        })


    }

})

function delAtributedit(id) {
    const delAtribute = document.getElementById('atr' + id)
    delAtribute.style.display = 'none'
    const nameAtribute = document.getElementById('data->atr_name' + id)
    nameAtribute.name = nameAtribute.name.slice(6)
    const valueAtribute = document.getElementById('data->atr_value' + id)
    valueAtribute.name = valueAtribute.name.slice(6)
}

function addAtribute(id) {
    let container = id.slice(3)//Atributes/Atributes14
    let editProductId = ''
    if (id.length > 12) editProductId = 'edit' + id.slice(12)//edit14
    const Atributes = document.getElementById(container)
    const div = document.createElement('div')
    div.id = 'atr' + window.count_atributes + editProductId
    div.classList.add('newAtribut', 'container')
    Atributes.append(div)

    const row1 = document.createElement('div')
    row1.classList.add('row')
    div.append(row1)
    const row2 = document.createElement('div')
    row2.classList.add('row')
    div.append(row2)

    const col11 = document.createElement('div')
    col11.classList.add('col-md-5')
    row1.append(col11)
    const col12 = document.createElement('div')
    col12.classList.add('col-md-5')
    row1.append(col12)

    const col21 = document.createElement('div')
    col21.classList.add('col-md-5')
    row2.append(col21)
    const col22 = document.createElement('div')
    col22.classList.add('col-md-5')
    row2.append(col22)
    const col23 = document.createElement('div')
    col23.classList.add('col-md-1', 'my-auto')
    row2.append(col23)

    const label_name = document.createElement('label')
    label_name.textContent = 'Название'
    label_name.for = 'data->atr_name' + window.count_atributes + editProductId
    label_name.classList.add('form-label');
    col11.append(label_name)

    const input_name = document.createElement('input')
    input_name.name = 'data->atr_name' + window.count_atributes + editProductId
    input_name.type = 'text'
    input_name.classList.add('form-control');
    //показать номер
    //input_name.value = 'Цвет'
    col21.append(input_name)

    const label_value = document.createElement('label')
    label_value.textContent = 'Значение'
    label_value.for = 'data->atr_value' + window.count_atributes + editProductId
    label_value.classList.add('form-label');
    col12.append(label_value)

    const input_value = document.createElement('input')
    input_value.name = 'data->atr_value' + window.count_atributes + editProductId
    input_value.type = 'text'
    input_value.classList.add('form-control');
    col22.append(input_value)

    const del_atr = document.createElement('a')
    //del_atr.href = '#'
    del_atr.id = window.count_atributes + editProductId      //параметр
    //функция удаления атрибутов
    del_atr.onclick = function delAtribute() {
        const delAtribute = document.getElementById('atr' + this.id)
        delAtribute.remove()
       
    }
    //del_atr.textContent = 'удалить атрибут'
    col23.append(del_atr)
    del_atr.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: gray;">  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>'

    window.count_atributes++
}