let remove = function()
{
    let container = this.parentElement;
    let id=this.getAttribute('id')
    fetch(`/removeNotification?id=${id}`).then(function(){
        container.innerHTML='';
    })
}

document.querySelectorAll(".ex").forEach(item => {
    item.addEventListener('click', remove)
});