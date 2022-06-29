
const form = document.querySelector("#form");
form.querySelector("#cerca").addEventListener("click", cerca);
form.querySelector("#preferiti").addEventListener("click", preferiti);

form.addEventListener("submit", checkSubmit);

let contenuto;


function onResponse(response) {
  console.log("Risposta ricevuta");
  return response.json();
}

//GENERAZIONE POST
function onJson(json) {
  
  document.querySelector("#sub1").classList.remove('hidden');
  document.querySelector("#sub2").classList.remove('hidden');

  console.log(json);
  const immagine = document.querySelector("#risposta");
  immagine.innerHTML = "";
  const img = document.createElement("img");
  img.classList.add('risultato');
  img.src = json.data[Math.round(Math.random() * 20)].logos.dark;
  immagine.appendChild(img);
  contenuto = img.src;
}

function cerca(event) {
  event.preventDefault();
  fetch("/create").then(onResponse).then(onJson);
}

//CARICAMENTO
function checkSubmit(event) {
  let descr = form.querySelector('#descr').value;
  console.log(contenuto);
  if (contenuto !== undefined){
    fetch("/carica_post/"+btoa(contenuto)+"/"+encodeURIComponent(descr)); 
    event.preventDefault();
    document.querySelector("#sub1").classList.add('hidden');
    document.querySelector("#risposta").classList.add('hidden');
  }
}


function jsonPreferiti(json){
  const res = document.querySelector('#risposta1');
  console.log(json);
  
  for(let i of json){
    c= JSON.parse(i.post.content); 

    if(i.preferiti){

      const us = document.createElement('div');
      us.classList.add('use');
      us.textContent = i.user.username;


      const box2 = document.createElement('div');
      box2.classList.add('box2');

      const descr = document.createElement('div');
      descr.classList.add('descr');
      descr.innerText = c.descrizione;

      const img = document.createElement("img");
      img.classList.add('post1');
      img.src = atob(c.url);

      box2.appendChild(us);
      box2.appendChild(descr);
      box2.appendChild(img);
      res.appendChild(box2);
    }
  }
} 


function preferiti(event){
  event.preventDefault();
  fetch("/cliente/stampa").then(onResponse).then(jsonPreferiti);
}

