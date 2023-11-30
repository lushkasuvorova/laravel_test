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
            let Atributes = edits[i].querySelectorAll('.atribut');
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
    div.classList.add('newAtribut')
    Atributes.append(div)

    const label_name = document.createElement('label')
    label_name.textContent = 'Название'
    label_name.for = 'data->atr_name' + window.count_atributes + editProductId
    label_name.classList.add('form-label');
    div.append(label_name)

    const input_name = document.createElement('input')
    input_name.name = 'data->atr_name' + window.count_atributes + editProductId
    input_name.type = 'text'
    input_name.classList.add('form-control');
    //показать номер
    //input_name.value = 'Цвет'
    div.append(input_name)

    const label_value = document.createElement('label')
    label_value.textContent = 'Значение'
    label_value.for = 'data->atr_value' + window.count_atributes + editProductId
    label_value.classList.add('form-label');
    div.append(label_value)

    const input_value = document.createElement('input')
    input_value.name = 'data->atr_value' + window.count_atributes + editProductId
    input_value.type = 'text'
    input_value.classList.add('form-control');
    div.append(input_value)

    const del_atr = document.createElement('a')
    //del_atr.href = '#'
    del_atr.id = window.count_atributes + editProductId      //параметр
    //функция удаления атрибутов
    del_atr.onclick = function delAtribute() {
        const delAtribute = document.getElementById('atr' + this.id)
        delAtribute.remove()
    }
    del_atr.textContent = 'удалить атрибут'
    div.append(del_atr)

    window.count_atributes++
}