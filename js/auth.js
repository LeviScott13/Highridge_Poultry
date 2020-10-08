// listen for auth status change
auth.onAuthStateChanged(user => {
    // if logged in
    if(user){
        //get data
        db.collection('semis').onSnapshot(snapshot => {
            setupUI(user);
            feedTrucks(snapshot.docs);
        });
    }
    //if logged out
    else{
        setupUI(user);
        feedTrucks([]);
        signedIn.style.visibility = 'hidden';
    }

});

// Create new Truck
const createForm = document.querySelector('#create-form');
createForm.addEventListener('submit', (e) => {
    e.preventDefault();
    db.collection('semis').add({
        truckNo: createForm['truckNo'].value,
        updatedMileageDry: createForm['updatedMileageDry'].value,
        updatedMileageFull: createForm['updatedMileageFull'].value,
        currentMileage: createForm['currentMileage'].value,
        dryService: createForm['dryService'].value,
        fullService: createForm['fullService'].value,
        dotService: createForm['dotService'].value
    }).then(() => {
        //close modal and reset form
        const modal = document.querySelector('#modal-create');
        var instance = M.Modal.init(modal);
        instance.close();
        createForm.reset();
    });
})

// Logout
const logout = document.querySelector('#logout');
logout.addEventListener('click', (e) => {
    e.preventDefault();
    auth.signOut().then(() => {
        console.log('user logged out');
    });
});

// Login
const loginForm = document.querySelector('#login-form');
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();

    //get user info
    const email = loginForm['login-email'].value;
    const password = loginForm['login-password'].value;

    auth.signInWithEmailAndPassword(email, password).then(cred => {

        // close the login modal and reset the form
        const modal = document.querySelector('#modal-login');
        var instance = M.Modal.init(modal);
        instance.close();
        loginForm.reset();
    });
});