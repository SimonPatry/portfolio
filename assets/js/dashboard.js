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

function addProject(event)
{
    console.log('coucou');
    event.preventDefault();
    let project = document.getElementById('newProj');
    let formData = new FormData(project);
    console.log(formData);
    fetch('index.php?ajax=addProj',
    {
        method: 'POST',
        body: formData,
    })
    .then(function(){
        projectsList(event); 
    })
}

function delProject(event)
{
    console.log("coucou");
    event.preventDefault();
    let confirm = window.confirm("Voulez-vous supprimer le projet ?")
    if(confirm)
	{
        let id = this.dataset.id;
        fetch(`index.php?ajax=delProj&id=${id}`)
        .then( function(){
            projectsList(event);
        })
	}
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
		    projectsList(null);
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
        let delProj = document.querySelectorAll('.delProject')
        delProj.forEach((deletePro)=>{
            deletePro.addEventListener('click', delProject);
        });
        let addImage = document.querySelectorAll('img');
        addImage.forEach((add)=>{
            add.addEventListener('click', selectImage);
        })
        document.getElementById("addProj").addEventListener('click', addProject);
        console.log(document.getElementById("addProj"));
    });
}

function galleryTable(event=null){
    if (event != null)
        event.preventDefault();
    fetch("index.php?ajax=gallery")
    .then(response => response.text())
    .then(response => {
        document.getElementById("content").innerHTML = response;
        document.querySelectorAll(".delCat").forEach(image => {image.addEventListener("click", delGallery)});
        document.getElementById('newGallery').addEventListener("click", addCategory);
    });
}

/********************************************************/
/*                      DOM
/********************************************************/

document.addEventListener("DOMContentLoaded",function(){
    document.getElementById('projects').addEventListener('click', projectsList);
    document.getElementById('categories').addEventListener("click", categoriesTable);
    document.getElementById('gallery').addEventListener('click', galleryTable);
});