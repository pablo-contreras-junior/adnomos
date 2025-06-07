const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");


// Abrir sidebar
menuBtn.addEventListener('click' , () => {
    sideMenu.style.display = 'block';
})

//Fechar sidbar
closeBtn.addEventListener( 'click', () =>{
    sideMenu.style.display = 'none'
})

// MUDAR THEME

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})

// Fill ordes in table

Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
        <tr>
            <td>${order.productNamer}</td>
            <td>${order.productNumber}</td>
            <td>${order.paymenStatus}</td>
            <td class="warning">${order.shipping === 'Declined' ? 'danger' : order.shipping === 'pendig' ? 'warning' : 'primary'}</td>
            <td class="primary">Details</td>
        </tr> `

        tr.innerHTML = trContent;
        document.querySelector('table body').appendChild('tr');
})


