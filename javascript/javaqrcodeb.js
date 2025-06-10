function changeInputMode(){
    const linkTypeselect=document.getElementById("link-type");
    const input=document.querySelector(".input");
    if(linkTypeselect.value==="whatsapp"){
        input.setAttribute("type","tel");
        input.setAttribute("placeholder","entrez votre numéro whatsapp...");
        input.removeAttribute("pattern");

    }else if(linkTypeselect.value==="instagram"){
        input.setAttribute("type","text");
        input.setAttribute("placeholder","Entrer votre nom utilisateur instagram...");
        input.setAttribute("pattern","[A-Za-z0-9_]+");

    }else if(linkTypeselect.value==="facebook"){
        input.setAttribute("type","text");
        input.setAttribute("placeholder","Entrzer votre nom utilisateur facebook...");
        input.setAttribute("pattern","[A-Za-z0-9_]+");

    }else if(linkTypeselect.value==="eleve"){
        input.setAttribute("type","text");
        input.setAttribute("placeholder","entrer votre numéro matricule,nom complet,niveau d'étude,code etablissement et annee scolaire...");
        input.setAttribute("pattern","[A-Za-z0-9_]+");

    }else if(linkTypeselect.value==="etudiant"){
        input.setAttribute("type","text");
        input.setAttribute("placeholder","entrer votre matricule etudiant,nom complet,niveau d'étude,code ufr et annee scolaire...");
        input.setAttribute("pattern","[A-Za-z0-9_]+");

    }else if(linkTypeselect.value==="fonctionaire"){
        input.setAttribute("type","text");
        input.setAttribute("placeholder","entrer votre matricule,nom complet,fonction,nom du service...");
        input.setAttribute("pattern","[A-Za-z0-9_]+");

    }else if(linkTypeselect.value==="chauffeeur"){
        input.setAttribute("type","text");
        input.setAttribute("placeholder","votre numero de permis,nom complet,matricule du veicule,la ligne occuppé...");
        input.setAttribute("pattern","[A-Za-z0-9_]+");
    }else {
        input.setAttribute("type","text");
        input.setAttribute("placeholder","Entrer votre texte ou URL a générer...");
        input.setAttribute("pattern");
    }
}
const generateBtn=document.querySelector(".generate-btn");
generateBtn.addEventListener("click",function(){
    const linkTypeselect=document.getElementById("link-type");
    const input=document.querySelector(".input");
    const qrCodeImg=document.getElementById("qr-code-img");
    let inputValue=input.value.trim();
    if(inputValue===""){
        alert("veuillez entrez votre texte ou URL !");
        qrCodeImg.style.marginBottom="0";
        retern;

    }
    let linkPrefix="";
    switch(linkTypeselect.value){
        case "url":
            linkPrefix="";
            break;
        case "whatsapp":
            if(!/^\d+$/.test(inputValue)){
                alert("Pour whatsapp veuillez entrez uniquement des chiffres pour le numéro!");
                qrCodeImg.style.marginBottom="0";
                retern;
            }
            linkPrefix="https://wa.me/?text=";
            break
        case "facebook":
            inputValue=encodeURIComponent(inputValue);
            linkPrefix="https://www.facebook.com/sharer/sharer.php?u=";
            break;
        case "instagram":
            if(inputValue.inclodes("")){
                alert("pour instagram veuillez entrez le nom utilisateur sans espaces !");
                qrCodeImg.style.marginBottom="0";
                retern;
            }
            break;
        default:
            break
    }
    qrCodeImg.src='https://api.barserver.com/v1/create-qr-code/?size=150x150&data=${linPrefix}${inputValue}';
    qrCodeImg.style.marginBotom="40px";
})