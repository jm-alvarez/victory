var body = document.getElementsByTagName('body')[0];
var shrink = document.getElementById('cross');

const addEvent = document.getElementById('btn-add-event');
const addEventContainer = document.getElementById('add-event-container');
const eventFrame = document.getElementById('add-event-frame');
const closeEvent = document.getElementById('btn-close-event');

const addProgram = document.getElementById('btn-add-program');
const addProgramContainer = document.getElementById('add-program-container');
const programFrame = document.getElementById('add-program-frame');
const closeProgram = document.getElementById('btn-close-program');

const addVol = document.getElementById('btn-add-volunteer');
const addVolFrame = document.getElementById('add-volunteer-frame');
const addVolContainer = document.getElementById('add-volunteer-container');
const closeVol = document.getElementById('btn-close-vol');

const openEdit = document.getElementById('open-edit');
const editVolCon = document.getElementById('edit-volunteer-container');
const editFrame = document.getElementById('edit-volunteer-frame');
const closeEdit = document.getElementById('btn-close-edit');


    shrink.addEventListener("click", function() {
        shrink.classList.toggle('burger');
        body.classList.toggle('shrink');
    });

    addEvent.addEventListener("click", function(){
        addEventContainer.classList.add("show");
        eventFrame.src = "add_event.php";

    });

    addProgram.addEventListener("click", function(){
        addProgramContainer.classList.add("show");
        programFrame.src = "add_program.php";

    });

    closeProgram.addEventListener("click", function(){
        addProgramContainer.classList.remove("show");
        programFrame.src = "";
    });

    closeEvent.addEventListener("click", function(){
        addEventContainer.classList.remove("show");
        eventFrame.src = "";
    });

    addVol.addEventListener("click", function(){
        addVolContainer.classList.add('show');
        addVolFrame.src = "add_volunteer.php";
    });

    closeVol.addEventListener("click", function(){
        addVolContainer.classList.remove('show');
        addVolFrame.src = ''
    });

    closeEdit.addEventListener("click", ()=>{
        editVolCon.classList.remove('show');
        editFrame.src = '';
    });