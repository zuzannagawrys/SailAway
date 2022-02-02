const applyButton = document.querySelector('.apply-for-spot');
const icon = document.querySelector(".fa-plus");
function apply() {
    const id=applyButton.getAttribute("id");
    fetch(`/applyForCruise/${id}`).then(function(){
        icon.innerHTML="";
    })
}

applyButton.addEventListener("click", event=>{
    const id=event.target.getAttribute("id");
    fetch(`/applyForCruise?id=${id}`).then(function(){
        applyButton.innerHTML="applied";
    })
});