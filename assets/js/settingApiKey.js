const switchElem = document.querySelectorAll('.form-switch')
const btnDelete = document.querySelectorAll('.btn-delete-api')

updateApiKey = () => {
    for (const btnSwitch of switchElem) {

        const checkBox = btnSwitch.querySelector('input')
        checkBox.addEventListener('change', (event) => {

            id = event.target.id
            id = id.replace('switch', '')

            isChecked = event.target.checked
            changeChecked = (isChecked === true) ? 1 : 0;

            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", `/dashboard/api/updateKey/${id}/${changeChecked}`)
            xhttp.send()

        })
    }
}

deleteApiKey = () => {
    for (const btn of btnDelete) {

        btn.addEventListener('click', (event) => {

            id = event.target.id
            id = id.replace('delete', '')

            console.log(id);

            const result = confirm(`Souhaitez-vous supprimer la Key id = ${id} ?`);

            if (result === true) {
                const xhttp = new XMLHttpRequest();
                xhttp.open("GET", `/dashboard/api/deleteKey/${id}`)
                xhttp.send()

                location.reload();
            }
        })
    }
}

updateApiKey()
deleteApiKey();