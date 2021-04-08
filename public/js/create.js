const photo = document.getElementById('photo');

const img = document.querySelector('#img-input').addEventListener('change',(e)=>{
    let string = e.srcElement.value;
    let res = string.slice(12);
    console.log(res)
    photo.value = res;
})