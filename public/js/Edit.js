const select = document.getElementById('edit-select');
const imgBtn = document.getElementById('image-btn');
const photo = document.getElementById('photo-input');
const img = document.getElementById('img-input');

select.addEventListener('change',()=>{
    let value = select.value;
    let url = 'http://localhost/linksApp/edit/getByIdOptionJSON/' + value;
    getJSON(url);
    console.log(value);
})

async function getJSON(url){
    const name = document.getElementById('name-input');
    const link = document.getElementById('link-input');
    const id = document.querySelector('.id-input');
    return fetch(url)
    .then(response => response.json())
    .then(json => {
        console.log(json);
        name.value = json[0].name;
        link.value = json[0].link;
        id.value = json[0].id;
        name.placeholder = json[0].name;
        link.placeholder = json[0].link;
        photo.value = json[0].img;
    }).catch((e)=>{
        console.log('fetch failed ' + e);
    });
}