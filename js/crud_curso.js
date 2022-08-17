//! VALIDAÇÃO FORMULÁRIO !//

// (() => {
//     "use strict";

//     const forms = document.querySelectorAll(".needs-validation");

//     Array.from(forms).forEach((form) => {
//         form.addEventListener(
//             "submit",
//             (event) => {
//                 if (!form.checkValidity()) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }

//                 form.classList.add("was-validated");
//             },
//             false
//         );
//     });
// })();

//! CADASTRO DE CURSO !//

const formCrudCurso = document.getElementById("form-crud-curso");
const spanMSG = document.getElementById("msg");

if (formCrudCurso) {
    formCrudCurso.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dadosForm = new FormData(formCrudCurso);

        const dados = await fetch("../controller/course/crud_course.php", {
            method: "POST",
            body: dadosForm,
        });

        const resposta = await dados.json();
        console.log(resposta);
        spanMSG.innerHTML = "";
        spanMSG.innerHTML = resposta["msg"];
        formCrudCurso.reset();
    });
}
