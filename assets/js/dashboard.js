
function delProject()
{

}

function editProject()
{

}

function projectsTable(event){
    event.preventDefault();
    fetch("index.php?ajax=projects")
    .then(response => response.text())
    .then(response => {
        document.getElementById("content").innerHTML = response;
        let modifaccueil = document.querySelectorAll('.editProject')
        modifaccueil.forEach((project)=>{
            project.addEventListener('click',showProjectForm);
        })
        let delProject = document.querySelectorAll('.delProject')
        delProject.forEach((deletePro)=>{
            deletePro.addEventListener('click',deleteProject);
        })
    });
}



/********************************************************/
/*                      DOM
/********************************************************/

document.addEventListener("DOMContentLoaded",function(){
    document.getElementById('projects').addEventListener('click',projectsTable);
    document.getElementById('categories').addEventListener("click", projectsTable);
    document.getElementById('cv').addEventListener('click', projectsTable);
    document.getElementById('contact').addEventListener('click', projectsTable);
});
