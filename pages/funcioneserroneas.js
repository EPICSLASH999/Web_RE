const open =document.getElementById('btnOpen');
const modal_container =document.getElementById('modal_container');
const close =document.getElementById('btnClose');


open.addEventListener('click', () => {
    modal_container.classList.add('show');
    alert('Prueba');
});

close.addEventListener('click', () => {
    modal_container.classList.remove('show');
    alert('No jala');
});
