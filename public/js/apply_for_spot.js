document.querySelector('.apply-for-spot').addEventListener("click", event=>{
    let id=event.target.getAttribute("id");
    fetch(`/applyForCruise?id=${id}`).then(function(){
        event.target.innerHTML="applied";
    })
});