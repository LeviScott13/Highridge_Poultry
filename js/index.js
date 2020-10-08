const feedTruckList = document.querySelector('.semis');
const loggedInLinks = document.querySelectorAll('.logged-in');
const loggedOutLinks = document.querySelectorAll('.logged-out');
var signedIn = document.getElementById('signedIn');
const months =  ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
const date = new Date();
var currentMonth = months[date.getMonth()];
console.log(currentMonth);
// Setup UI Display
const setupUI = (user) => {
    //if user is signed in
    if(user){
        //toggle UI setup
        loggedInLinks.forEach(item => item.style.display = 'block');
        loggedOutLinks.forEach(item => item.style.display = 'none');
        signedIn.style.visibility = "visible";
    }else{

        //toggle UI setup
        loggedInLinks.forEach(item => item.style.display = 'none');
        loggedOutLinks.forEach(item => item.style.display = 'block');
        signedIn.style.visibility = "hidden";
    }
}

//setup trucks
const feedTrucks = (data) => {
    let html = '';
    let formCount = 0;
    data.forEach(doc => {
        const trucks = doc.data();
        formCount++;
        //Table Data
        const tr = `
            <div style="background: black">
                <form id=form${formCount} style="background-color: black">
                    <div style="background-color:black; padding-top: 20px; padding-bottom: 30px;">
                        <div style="width: 12%; float: left; margin-right: 15px; text-align: center;">
                            <h7 style="color: aqua; margin: 0px;">Truck No.</h7>
                        </div>
                        <div style="width: 11%; float: left; margin-right: 15px; text-align: center;">
                            <h7 style="color: aqua; margin: 0px;">Serviced Mileage <br>(Dry)</h7>
                        </div>
                        <div style="width: 11%; float: left; margin-right: 15px; text-align: center;">
                            <h7 style="color: aqua; margin: 0px;">Serviced Mileage <br>(Full)</h7>
                        </div>
                        <div style="width: 11%; float: left; margin-right: 15px; text-align: center;">
                            <h7 style="color: aqua; margin: 0px;">Mileage</h7>
                        </div>
                        <div style="width: 11%; float: left; margin-right: 15px; text-align: center;">
                            <h7 style="color: aqua; margin: 0px;">Dry Service</h7>
                        </div>
                        <div style="width: 11%; float: left; margin-right: 15px; text-align: center;">
                            <h7 style="color: aqua; margin: 0px;">Full Service</h7>
                        </div>
                        <div style="width: 11%; float: left; text-align: center;">
                            <h7 style="color: aqua; margin: 0px;">DOT</h7>
                        </div>
                    </div>
                    <br>
                    <div style="width: 11%; float: left; margin-right: 15px">
                        <input style="padding-left: 10px; color: white;" type="text" size=1 value=${trucks.truckNo} id="newTruckNum${formCount}" required />
                    </div>
                    <div style="width: 11%; float: left; margin-right: 15px">
                        <input style="padding-left: 10px; color: white;" type="text" size=1 value=${trucks.updatedMileageDry} id="newUpdatedMileageDry${formCount}" required />
                    </div>  
                    <div style="width: 11%; float: left; margin-right: 15px">
                        <input style="padding-left: 10px; color: white;" type="text" size=1 value=${trucks.updatedMileageFull} id="newUpdatedMileageFull${formCount}" required />
                    </div>
                    <div style="width: 11%; float: left; margin-right: 15px"> 
                        <input style="padding-left: 10px; color: white;" type="text" size=1 value=${trucks.currentMileage} id="newCurrentMileage${formCount}" required />
                    </div>
                    <div style="width: 11%; float: left; margin-right: 15px">  
                        <input style="padding-left: 10px; color: white;" type="text" size=1 value=${trucks.dryService.substring(0,10)} id="newDryService${formCount}" required />
                    </div>
                    <div style="width: 11%; float: left; margin-right: 15px">
                        <input style="padding-left: 10px; color: white;" type="text" size=1 value=${trucks.fullService.substring(0,10)} id="newFullService${formCount}" required />
                    </div>
                    <div style="width: 11%; float: left; margin-right: 15px">
                        <input style="padding-left: 10px; color: white;" type="text" size=1 value=${trucks.dotService.substring(0,7)} id="newDotService${formCount}" required />
                    </div>
                    <div style="width: 11%; float: left; margin-left: 40px">
                        <button id=btn style="border: 2px solid aqua; padding: 5px 5px; font-size: 14px" onclick="updateTruck()">Update</button>
                    </div>
                    <br>
                    <br>
                    <br>
                </form>
            </div>
        `;
        html += tr;
    });
    feedTruckList.innerHTML = html;
    updateTruck();
    flagTruckDry();
    flagTruckFull();
    flagTruckDOT();
}

function flagTruckDry(){
    //Truck 1
    if(document.getElementById("newCurrentMileage1").value - document.getElementById("newUpdatedMileageDry1").value >= 10000){
        document.getElementById("newUpdatedMileageDry1").style.color = "red";
    }
    else if(document.getElementById("newCurrentMileage1").value - document.getElementById("newUpdatedMileageDry1").value < 9999 && document.getElementById("newCurrentMileage1").value - document.getElementById("newUpdatedMileageDry1").value >= 5000){
        document.getElementById("newUpdatedMileageDry1").style.color = "orange";
    }
    //Truck 2
    if(document.getElementById("newCurrentMileage2").value - document.getElementById("newUpdatedMileageDry2").value >= 10000){
        document.getElementById("newUpdatedMileageDry2").style.color = "red";
    }
    else if(document.getElementById("newCurrentMileage2").value - document.getElementById("newUpdatedMileageDry2").value < 9999 && document.getElementById("newCurrentMileage2").value - document.getElementById("newUpdatedMileageDry2").value >= 5000){
        document.getElementById("newUpdatedMileageDry2").style.color = "orange";
    }
}
function flagTruckFull(){
    //Truck 1
    if(document.getElementById("newCurrentMileage1").value - document.getElementById("newUpdatedMileageFull1").value >= 20000){
        document.getElementById("newUpdatedMileageFull1").style.color = "red";
    }
    else if(document.getElementById("newCurrentMileage1").value - document.getElementById("newUpdatedMileageFull1").value < 19999 && document.getElementById("newCurrentMileage1").value - document.getElementById("newUpdatedMileageFull1").value >= 15000){
        document.getElementById("newUpdatedMileageFull1").style.color = "orange";
    }
    //Truck 2
    if(document.getElementById("newCurrentMileage2").value - document.getElementById("newUpdatedMileageFull2").value >= 20000){
        document.getElementById("newUpdatedMileageFull2").style.color = "red";
    }
    else if(document.getElementById("newCurrentMileage2").value - document.getElementById("newUpdatedMileageFull2").value < 19999 && document.getElementById("newCurrentMileage2").value - document.getElementById("newUpdatedMileageFull2").value >= 15000){
        document.getElementById("newUpdatedMileageFull2").style.color = "orange";
    }
}
function flagTruckDOT(){
    //Truck 1
    if(document.getElementById("newDotService1").value.substring(5,7) == currentMonth && document.getElementById("newDotService1").value.substring(0,4) != date.getFullYear()){
        document.getElementById("newDotService1").style.color = "red";
    }
    //Truck 2
    if(document.getElementById("newDotService2").value.substring(5,7) == currentMonth && document.getElementById("newDotService2").value.substring(0,4) != date.getFullYear()){
        document.getElementById("newDotService2").style.color = "red";
    }
}
function updateTruck(){
    flagTruckDry();
    flagTruckFull();
    flagTruckDOT();

    //Truck 1
    db.collection("semis").doc("ZIWHgEQG7Gn9D8Zjk6R4").update({
        truckNo: document.getElementById("newTruckNum1").value,
        updatedMileageDry: document.getElementById("newUpdatedMileageDry1").value,
        updatedMileageFull: document.getElementById("newUpdatedMileageFull1").value,
        currentMileage: document.getElementById("newCurrentMileage1").value,
        dryService: document.getElementById("newDryService1").value,
        fullService: document.getElementById("newFullService1").value,
        dotService: document.getElementById("newDotService1").value
    })
    //Truck 2
    db.collection("semis").doc("jRlBQdsznP7XkNCmHfts").update({
        truckNo: document.getElementById("newTruckNum1").value,
        updatedMileageDry: document.getElementById("newUpdatedMileageDry2").value,
        updatedMileageFull: document.getElementById("newUpdatedMileageFull2").value,
        currentMileage: document.getElementById("newCurrentMileage2").value,
        dryService: document.getElementById("newDryService2").value,
        fullService: document.getElementById("newFullService2").value,
        dotService: document.getElementById("newDotService2").value
    })
    feedTrucks();
}


document.addEventListener('DOMContentLoaded', function () {
    var modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    var items = document.querySelectorAll('.collapsible');
    M.Collapsible.init(items);
  });