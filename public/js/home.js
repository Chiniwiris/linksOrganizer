const deletebtns = document.querySelectorAll('.delete-btn');
deletebtns.forEach(btn => {
    const elementId = btn.parentNode.parentNode.id;
    const element = btn.parentElement.parentElement;
    const url = 'http://localhost/linksApp/main/deleteItem/' + elementId;
    btn.addEventListener('click', ()=>{
        if(deleteAJAX(url)){
            btn.parentNode.parentNode.parentNode.removeChild(element);
        } 
    })
})

const hoverContainer = document.querySelectorAll('.hover-container');
hoverContainer.forEach(item => {
    const url = item.id;
    item.addEventListener('click',(e)=>{
        window.open(url);
        console.log(e);
    })
})

async function deleteAJAX(url){
    return fetch(url)
    .then(res => res.text())
    .then(data => {
        console.log(data);
        if(data === 'deleted'){
            return true;
        } else{
            return false;
        }
    });
    //borrar en la base de datos.
}
