document.addEventListener("DOMContentLoaded", () => {

    // ----- SLIDER DE FOND -----
    let bgIndex = 0;
    const bgSlides = document.querySelectorAll('.bg-slider img');

    setInterval(() => {
        bgSlides[bgIndex].classList.remove('active');
        bgIndex = (bgIndex + 1) % bgSlides.length;
        bgSlides[bgIndex].classList.add('active');
    }, 5000);

    // ----- ACCORDÉONS -----
    const accordions = document.querySelectorAll(".accordion-item");
    accordions.forEach(item => {
        const btn = item.querySelector(".accordion-btn");
        btn.addEventListener("click", () => {
            item.classList.toggle("active");
            const content = item.querySelector(".accordion-content");
            content.style.maxHeight = item.classList.contains("active") ? content.scrollHeight + "px" : 0;
        });
    });

// BURGER MENU
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');

    burger.addEventListener('click', () => {
        menu.classList.toggle('active');
    });

    // Fermer le menu quand on clique sur un lien
    menu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => menu.classList.remove('active'));
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contact-form");
    const messageBox = document.createElement("div");
    messageBox.id = "form-message";
    form.appendChild(messageBox);

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Empêche l'envoi normal

        const formData = new FormData(form);

        fetch("send_mail.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            messageBox.style.padding = "10px";
            messageBox.style.marginTop = "10px";
            messageBox.style.borderRadius = "5px";
            messageBox.style.fontWeight = "bold";

            if (data.success) {
                // Message succès
                messageBox.style.backgroundColor = "#d4f8d4";
                messageBox.style.color = "#2d7a2d";
                messageBox.innerText = data.message;

                // Réinitialiser le formulaire
                form.reset();

            } else {
                // Message erreur
                messageBox.style.backgroundColor = "#ffd6d6";
                messageBox.style.color = "#a30000";
                messageBox.innerText = data.message;
            }
        })
        .catch(error => {
            messageBox.style.backgroundColor = "#ffd6d6";
            messageBox.style.color = "#a30000";
            messageBox.innerText = "Une erreur est survenue.";
        });
    });
});
document.querySelectorAll('.voir-plus-btn').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();
        const pdfUrl = btn.getAttribute('data-pdf') || btn.getAttribute('href'); // permet href ou data-pdf
        document.getElementById('pdfFrame').src = pdfUrl;
        document.getElementById('pdfModal').style.display = 'block';
    });
});

document.querySelector('.close').addEventListener('click', function(){
    document.getElementById('pdfModal').style.display = 'none';
    document.getElementById('pdfFrame').src = '';
});

// fermer modal en cliquant en dehors
window.addEventListener('click', function(e){
    if(e.target === document.getElementById('pdfModal')){
        document.getElementById('pdfModal').style.display = 'none';
        document.getElementById('pdfFrame').src = '';
    }
});

document.querySelectorAll('.download-btn').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();
        const pdfUrl = btn.getAttribute('data-pdf') || btn.getAttribute('href'); // permet href ou data-pdf
        document.getElementById('pdfFrame').src = pdfUrl;
        document.getElementById('pdfModal').style.display = 'block';
    });
});

document.querySelector('.close').addEventListener('click', function(){
    document.getElementById('pdfModal').style.display = 'none';
    document.getElementById('pdfFrame').src = '';
});

// fermer modal en cliquant en dehors
window.addEventListener('click', function(e){
    if(e.target === document.getElementById('pdfModal')){
        document.getElementById('pdfModal').style.display = 'none';
        document.getElementById('pdfFrame').src = '';
    }
});
document.getElementById("burger").onclick = ()=>{
    document.getElementById("menu").classList.toggle("active");
}
then(result => {
    const msgDiv = document.getElementById("formMessage");
    msgDiv.textContent = result.message;
    msgDiv.style.color = result.success ? "green" : "red";
    msgDiv.scrollIntoView({ behavior: "smooth" });
    if (result.success) form.reset();
})
// Ouvrir PDF modal
document.querySelectorAll('.voir-plus-btn').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();
        const pdfUrl = btn.getAttribute('data-pdf');
        document.getElementById('pdfFrame').src = pdfUrl;
        document.getElementById('pdfModal').style.display = 'flex';
    });
});

// Fermer modal avec la croix
document.querySelector('.close').addEventListener('click', function(){
    document.getElementById('pdfModal').style.display = 'none';
    document.getElementById('pdfFrame').src = '';
});

// Fermer modal en cliquant en dehors
window.addEventListener('click', function(e){
    if(e.target === document.getElementById('pdfModal')){
        document.getElementById('pdfModal').style.display = 'none';
        document.getElementById('pdfFrame').src = '';
    }
});
