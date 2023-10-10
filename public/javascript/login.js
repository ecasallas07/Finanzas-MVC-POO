// Selección de elementos con clase "form"
const formElements = document.querySelectorAll(".form");

// Agregar eventos "keyup", "blur" y "focus" a elementos "input" y "textarea"
formElements.forEach(form => {
    const inputsAndTextareas = form.querySelectorAll("input, textarea");

    inputsAndTextareas.forEach(inputOrTextarea => {
        inputOrTextarea.addEventListener("keyup", function (e) {
            const label = this.previousElementSibling;

            if (e.type === "keyup") {
                if (this.value === "") {
                    label.classList.remove("active", "highlight");
                } else {
                    label.classList.add("active", "highlight");
                }
            } else if (e.type === "blur") {
                if (this.value === "") {
                    label.classList.remove("active", "highlight");
                } else {
                    label.classList.remove("highlight");
                }
            } else if (e.type === "focus") {
                if (this.value === "") {
                    label.classList.remove("highlight");
                } else if (this.value !== "") {
                    label.classList.add("highlight");
                }
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function(){
   const tablinks = document.querySelectorAll(".tab-group a");
   const tabContents = document.querySelectorAll(".tab-contents .tab-content");

   tablinks.forEach(link =>{
       link.addEventListener("click", function (e){
           e.preventDefault();

           tabContents.forEach(content =>{
               content.style.display = "none";
           });

           const tabId = this.getAttribute("data-tab");
           const tabContent = document.getElementById(tabId);
           tabContent.style.display ="block";

           tablinks.forEach(tabLink => {
               tabLink.parentElement.classList.remove("active");
           });

           this.parentElement.classList.add("active");

       });

   });
   tablinks[0].click();
});

