let Publication = document.querySelector("#formulaire_publication");
let buttonPublier = document.querySelector("#publier");
let sectionProfil = document.querySelector("section");
Publication.style.display = "none";
let btnClose = document.querySelector("#btnClose");
btnClose.src = "img/close.png";
//en attente
// let formChange = document.querySelector("#formulaire_changerPP");
// let btnCloseChange = document.querySelector(".btnClose");
// let btnChangerPhoto= document.querySelector("#changerPhoto");
// 
// formChange.style.display = "none";

//Event
buttonPublier.addEventListener("click",function(){
    Publication.style.display = "block";
});

btnClose.addEventListener("click",function(){
    Publication.style.display = "none";
    // sectionProfil.style.opacity = `1`;


});
// btnChangerPhoto.addEventListener("click",function(){
//     formChange.style.display = "block";
// });
// btnCloseChange.addEventListener("click",function(){
//     formChange.style.display = "none";
// });











// // Écouter l'événement change
// input1.addEventListener("change", function (e) {
//     // Obtenir le premier fichier
//     const file = e.target.files[0];
  
//     // Créer un objet FileReader
//     const reader = new FileReader();
  
//     // Lire le contenu du fichier
//     reader.readAsDataURL(file);
  
//     // Écouter l'événement loadend
//     reader.addEventListener("loadend", function () {
//       // Récupérer l'URL de données de l'image
//       const dataURL = reader.result;
  
//       // Afficher l'URL de données
//       console.log(dataURL);
//       imgPrev.src = dataURL; 
      
//     });
//   });