const btnTogglePwd = document.querySelectorAll('.btn-password');
console.log(btnTogglePwd)

for (const btn of btnTogglePwd) {

    btn.addEventListener('click', (event) => {
      
        
        const divParent = event.target.closest('.input-group')
        const btnEye = divParent.querySelector('.fa-eye');
        const inputPwd = divParent.querySelector('input')
        const currentType = inputPwd.getAttribute('type')


        if(currentType === 'password')
            inputPwd.setAttribute('type','text')
        else
            inputPwd.setAttribute('type','password')

        btnEye.classList.toggle('fa-eye-slash')


    console.log(currentType)

    })
}