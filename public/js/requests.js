let accepted = function()
{
    let container = this.parentElement.parentElement.parentElement;
    let id=this.getAttribute('id')
    fetch(`/requestAccepted?id=${id}`).then(function(){
            container.innerHTML='';
    })
}
let denied = function()
{
    let container = this.parentElement.parentElement.parentElement;
    let id=this.getAttribute('id')
    fetch(`/requestDenied?id=${id}`).then(function(){
        container.innerHTML='';
    })
}

document.querySelectorAll('.yes').forEach(item => {
    item.addEventListener('click', accepted)
});

document.querySelectorAll('.no').forEach(item => {
    item.addEventListener('click', denied)
});