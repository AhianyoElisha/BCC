//Elements
const clear = document.querySelector(".clear");
const dateElement = document.getElementById("go");
const list = document.getElementById("list");
const input = document.getElementById("input");
// Classes
const CHECK = "fa-check-circle";
const UNCHECK = "fa-circle-thin";
const LINE_THROUGH = "lineThrough";

//Variables
let LIST,id;

//get item from local storage
let data = localStorage.getItem("TODO");

//check if data is not empty
if (data) {
    LIST = JSON.parse(data);
    id = LIST.length;//set the id to the last one in the list
    loadList(LIST);//load the list to the user interface
} else {
    //if no data
    LIST = [];
    id = 0; 
}
//load items to the user's interface
function loadLIst(array) {
    array.forEach(function(item){
        addToDo(item.name, item.id, item.done, item.trash);
    });
}
//clear local storage
clear.addEventListener("click", function () {
    localStorage.clear();
    location.reload();
})

//Current date
const options = {weekday : "long", month : "short", day : "numeric"};
const today = new Date(options);

dateElement.innerHTML = today.toLocaleDateString("en-US", options); 

//add to do
function addToDo(toDo, id, done, trash) {
    if (trash) {
        return;
    }
    const DONE =done? CHECK :UNCHECK;
    const LINE =done?LINE_THROUGH :"";
    const item = `
    
            <li class="items" id="items">
                <i class="fa ${DONE} fa-2x co" job="complete" id=${id}></i>
                <p class="text${LINE}">${toDo}</p>
                <i class="fa fa-trash-o fa-2x" job="delete" id=${id}></i>
            </li>
    `;
    const position = "beforeend";
    list.insertAdjacentHTML(position, item);
}

// add item with enter key
document.addEventListener("keyup", function(even){
    if (event.keyCode == 13) {
        const toDo = input.value;
        //if the input isn't empty
       if (toDo) {
        addToDo(toDo, id, false, false);
        LIST.push({
            name : toDo,
            id : id,
            done :false,
            trash : false
        });
        //add item to localstorage ( this code must be added where the list is updated)
localStorage.setItem("TODO",JSON.stringify(LIST));
        id++;
       }
       input.value = ""; 
    }  
});

//complete to do 
function completeToDo(element){
    element.classList.toggle(CHECK);
    element.classList.toggle(UNCHECK);
    element.parentNode.querySelector(".text").classList.toggle(LINE_THROUGH);

    LIST[element.id].done = LIST[element.id].done ? false : true; 

}

//remove to do
function removeToDo(element){
    element.parentNode.parentNode.removeChild(element.parentNode);

    LIST[element.id].trash = true;
}

//target the items created dynamiclally

list.addEventListener("click",function(event){
    const element = event.target;// return the clicked element inside list
    const elementJob = element.attributes.job.value;// complete or delete

    if (elementJob == "complete") {
        completeToDo(element);
    } else if (elementJob == "delete") {
        removeToDo(element);
    }
    //add item to localstorage ( this code must be added where the list is updated)
localStorage.setItem("TODO",JSON.stringify(LIST));
})








/*

<i class="fa fa-spinner w3-spin"></i>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"></link>*/