/********************************************************/
/*                      CATEGORIES
/********************************************************/

function categoriesTable(event=null){
    if (event != null)
        event.preventDefault();
    fetch("index.php?ajax=categories")
    .then(response => response.text())
    .then(response => {
        document.getElementById("content").innerHTML = response;
        document.querySelectorAll(".editCat").forEach(category => {category.addEventListener("click", editCategory)});
         document.querySelectorAll(".delCat").forEach(category => {category.addEventListener("click", delCategory)});
         document.getElementById('newCat').addEventListener("click", addCategory);
    });
}

function delCategory(){
	if(window.confirm("Etes vous sur de vouloir suppriemr cette catégorie ?")){
	    event.preventDefault();
	    let tr = this.parentNode.parentNode;
	    fetch(`index.php?ajax=delCategory&id=${tr.id}`)
	    .then(response => {
	        showCategoryTable();
	    });
	}
}

function addCategory(){
    event.preventDefault();
	let  category = {
		name: document.getElementById("catName").value,
		is_dish: document.getElementById("is_dish").value,
		description: document.getElementById("description").value,
	}
	console
    category = JSON.stringify(category);
    let options = {
    	method : 'POST',
    	body : category,
    	headers:{'Content-Type':'application/json'}
    }

    fetch(`index.php?ajax=addCategory`, options)
    .then( function (){
	    showCategoryTable();
    })
}

function editCategory(){
    event.preventDefault();
    let tr = this.parentNode.parentNode;
    tr.classList.toggle("hide");
    if (tr.dataset.id == 1){
        tr.nextElementSibling.classList.toggle("hide");
        let cat = document.getElementById(tr.id);
    	let  category = {
    		id: tr.querySelector(".id").value,
    		name: tr.querySelector(".name").value,
    		is_dish: tr.querySelector(".is_dish").value,
    		description: tr.querySelector(".description").value,
    	}
        category = JSON.stringify(category);
        let options = {
        	method : 'POST',
        	body : category,
        	headers:{'Content-Type':'application/json'}
        }
        
        fetch(`index.php?ajax=editCategory`, options)
        .then( function (){
		    showCategoryTable();
	    })
    }
    else{
        tr.previousElementSibling.classList.toggle("hide");
    }
}

/********************************************************/
/*                      Projects
/********************************************************/

function addProject(){
    let  project = {
        id: art.dataset.id,
        name: proj.querySelector(".name").value,
        cat: proj.querySelector(".cat").value,
        description: proj.querySelector(".desc").value,
        image: proj.querySelector(".image").value,
        video: proj.querySelector(".vid").value,
    }
    project = JSON.stringify(project);
    let options = {
        method : 'POST',
        body : project,
        headers:{'Content-Type':'application/json'}
    }
    fetch(`index.php?ajax=addProj`, options)
    .then( function (){
        projectsTable(null);
    })
}

function delProject()
{

}

function showProjectForm(){
    let art = this.parentNode.parentNode;
    art.classList.toggle("hide");

    document.querySelector('.save').addEventListener('click',showProjectForm);
    console.log(art);
    if (art.dataset.name == "form")
    {
        art.nextElementSibling.classList.toggle("hide");
        let proj = document.getElementById(art.dataset.id);
    	let  project = {
    		id: art.dataset.id,
    		name: proj.querySelector(".name").value,
    		cat: proj.querySelector(".cat").value,
    		description: proj.querySelector(".desc").value,
            image: proj.querySelector(".image").value,
            video: proj.querySelector(".vid").value,
    	}
        console.log(project);
        project = JSON.stringify(project);
        let options = {
        	method : 'POST',
        	body : project,
        	headers:{'Content-Type':'application/json'}
        }
        console.log(options);
        fetch(`index.php?ajax=editProj`, options)
        .then( function (){
		    projectsTable(null);
	    })
    }
    else{
        art.previousElementSibling.classList.toggle("hide");
    }
}

function selectImage(){
    var opener = window.open('file:///assets/ressources/images');
}

function projectsList(event){
    if (event != null)
        event.preventDefault();
    fetch("index.php?ajax=projects")
    .then(response => response.text())
    .then(response => {
        document.getElementById("content").innerHTML = response;
        let editPro = document.querySelectorAll('.editProject')
        editPro.forEach((project)=>{
            project.addEventListener('click',showProjectForm);
        })
        let delProject = document.querySelectorAll('.delProject')
        delProject.forEach((deletePro)=>{
            deletePro.addEventListener('click',deleteProject);
        let addImage = document.querySelectorAll('img');
        addImage.forEach((add)=>{
            add.addEventListener('click', selectImage);
        })
        })
    });
}



/********************************************************/
/*                      DOM
/********************************************************/

document.addEventListener("DOMContentLoaded",function(){
    document.getElementById('projects').addEventListener('click', projectsList);
    document.getElementById('categories').addEventListener("click", categoriesTable);
    /*document.getElementById('cv').addEventListener('click', projectsTable);
    document.getElementById('contact').addEventListener('click', projectsTable);*/
});
