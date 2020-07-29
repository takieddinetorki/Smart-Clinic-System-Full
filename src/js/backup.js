var backupBtn = document.getElementById('backupBtn');
backupMenu = document.getElementById('backupMenu'),
    lockModal = document.getElementById('lockModal'),
    lockQuarterly = document.getElementById('lockQuarterly'),
    lockItem = document.getElementById('lockItem'),
    lockMBtn = document.getElementById('lockMBtn'),
    lockQBtn = document.getElementById('lockQBtn'),
    lockMonth = document.getElementById('lockMonth'),
    lockYBtn = document.getElementById('lockYBtn'),
    lockYear = document.getElementById('lockYear'),
    backupModal = document.getElementById('backupModal'),
    backupItem = document.getElementById('backupItem'),
    restoreModal = document.getElementById('restoreModal'),
    restoreItem = document.getElementById('restoreItem');

backupBtn.addEventListener('click', openBackupMenu);
lockItem.addEventListener('click', openlockModal);
backupItem.addEventListener('click', openBackupModal);
restoreItem.addEventListener('click', openRestoreModal);

function switchActivebtn(id) {
    var ids = ['backupBtn', 'doctorsBtn', 'reportBtn', 'inventoryBtn','expensebtn']
    document.getElementById(id).classList.toggle("btnactive");
    for (var i = 0; i < ids.length; i++) {
      if (ids[i] != id) {
        document.getElementById(ids[i]).classList.remove("btnactive");
      }
    }
  }
function openBackupMenu() {

    if (backupMenu.style.display === "none") {
        backupMenu.style.display = "block";
        backupBtn.style.backgroundColor = '#BEB9C5';
        doctorsMenu.style.display = "none";
        reportBox.style.display = "none";
        inventoryMenu.style.display = "none";
        expenseBox.style.display = "none";

    } else {
        backupMenu.style.display = "none";
        backupBtn.style.backgroundColor = '#B597DC';
    }
    switchActivebtn('backupBtn');
}

function openRestoreModal() {
    restoreModal.style.display = 'block';
    lockModal.style.display = "none";
    backupModal.style.display = 'none';
}

function openBackupModal() {
    backupModal.style.display = 'block';
    lockModal.style.display = "none";
    restoreModal.style.display = 'none';

}

function openlockModal() {
    lockModal.style.display = "block";
    backupModal.style.display = 'none';
    restoreModal.style.display = 'none';
    if (lockMBtn.checked == true) {

        lockQuarterly.style.display = 'none'
    }
    lockQBtn.addEventListener('click', showBackQ);
    lockYBtn.addEventListener('click', showBackY);
}

function showBackM() {
    lockQuarterly.style.display = 'none';
    lockMonth.style.display = 'block';
    lockYBtn.addEventListener('click', showBackY);
    lockQBtn.addEventListener('click', showBackQ);
}

function showBackY() {
    lockQuarterly.style.display = 'none';
    lockMonth.style.display = 'none';
    lockMBtn.addEventListener('click', showBackM);
    lockQBtn.addEventListener('click', showBackQ);
}



function showBackQ() {
    lockMonth.style.display = 'none';
    lockQuarterly.style.display = 'block';
    lockMBtn.addEventListener('click', showBackM);
    lockYBtn.addEventListener('click', showBackY);
}



var doctorsBtn = document.getElementById('doctorsBtn');
var doctorsMenu = document.getElementById('doctorsMenu');
var sales = document.getElementById('sales');
var rowTb = document.getElementsByClassName('rowTb');
var closeBtn = document.getElementById('closeBtn');

doctorsBtn.addEventListener('click', openDoctorsTb);

function openDoctorsTb() {


    if (doctorsMenu.style.display === "none") {
        doctorsMenu.style.display = "block";
        doctorsBtn.style.backgroundColor = '#BEB9C5';
        backupMenu.style.display = "none";
        reportBox.style.display = "none";
        inventoryMenu.style.display = "none";
        expenseBox.style.display = "none";

    } else {
        doctorsMenu.style.display = "none";
        doctorsBtn.style.backgroundColor = '#B597DC';
    }
    rowTb[0].addEventListener('click', saleModal);
    switchActivebtn('doctorsBtn');
}

function saleModal() {
    sales.style.display = "block";
    doctorsMenu.style.display = "none";
    closeBtn.addEventListener('click', () => {
        var saveModal = document.getElementById('saveModal');
        sales.style.background = 'rgba(179,180,190,0.3)'
        saveModal.style.display = "block";
        var btn2 = document.getElementById('btn2');
        btn2.addEventListener('click', () => {
            sales.style.display = "none";
            doctorsMenu.style.display = "block";
            saveModal.style.display = "none";
        })
    });
}



var reportBtn = document.getElementById('reportBtn');
var reportBox = document.getElementById('reportBox');


reportBtn.addEventListener('click', openReportBox);

function openReportBox() {
    if (reportBox.style.display === "none") {
        reportBox.style.display = "block";
        reportBtn.style.backgroundColor = '#BEB9C5';
        doctorsMenu.style.display = "none";
        inventoryMenu.style.display = "none";
        backupMenu.style.display = "none";
        expenseBox.style.display = "none";
    } else {
        reportBox.style.display = "none";
        reportBtn.style.backgroundColor = '#B597DC';
    }
    switchActivebtn('reportBtn');
}

var inventoryBtn = document.getElementById('inventoryBtn');
var inventoryMenu = document.getElementById('inventoryMenu');

inventoryBtn.addEventListener('click', openInventoryMenu);

function openInventoryMenu() {
    if (inventoryMenu.style.display === "none") {
        inventoryMenu.style.display = "block";
        inventoryBtn.style.backgroundColor = '#BEB9C5';
        doctorsMenu.style.display = "none";
        backupMenu.style.display = "none";
        reportBox.style.display = "none";
        expenseBox.style.display = "none";
    } else {
        inventoryMenu.style.display = "none";
        inventoryBtn.style.backgroundColor = '#B597DC';
    }
    switchActivebtn('inventoryBtn');
}

//expense
var expenseBtn = document.getElementById('expensebtn');
var expenseBox = document.getElementById('expenseBox');

expenseBtn.addEventListener('click', openExpenseMenu);

function openExpenseMenu() {
    if (expenseBox.style.display === "none") {
        expenseBox.style.display = "block";
        expenseBtn.style.backgroundColor = '#BEB9C5';
        doctorsMenu.style.display = "none";
        backupMenu.style.display = "none";
        reportBox.style.display = "none";
        inventoryMenu.style.display = "none";

    } else {
        expenseBox.style.display = "none";
        expenseBtn.style.backgroundColor = '#B597DC';
    }
    switchActivebtn('expensebtn');
}


//vendor 
var vendorBtn = document.getElementById('vendorbtn');
var vendorMenu = document.getElementById('vendorMenu');

vendorBtn.addEventListener('click', openVendorMenu);

function openVendorMenu() {
    if (vendorMenu.style.display === "none") {
        vendorMenu.style.display = "block";

        // doctorsMenu.style.display = "none";
        // backupMenu.style.display = "none";
        // reportBox.style.display = "none";
        // expenseBox.style.display = "none";
    } else {
        vendorMenu.style.display = "none";

    }
}


//barcode 

var barcodebtn = document.getElementById('barcodebtn');
var barcodeMenu = document.getElementById('barcodeMenu');

barcodebtn.addEventListener('click', openBarcodeMenu);

function openBarcodeMenu() {
    if (barcodeMenu.style.display === "none") {
        barcodeMenu.style.display = "block";

        // doctorsMenu.style.display = "none";
        // backupMenu.style.display = "none";
        // reportBox.style.display = "none";
        // expenseBox.style.display = "none";
    } else {
        barcodeMenu.style.display = "none";

    }
}


//vendor modal not working

var vendorTablebtn = document.getElementsByClassName('rowv');
var vendortablemodal = document.getElementById('vendortablemodal');

vendorTablebtn.addEventListener('click', openvendortablemodal);

function openvendortablemodal() {
    if (vendortablemodal.style.display === "none") {
        vendortablemodal.style.display = "block";

        vendorMenu.style.display = "none";
        // backupMenu.style.display = "none";
        // reportBox.style.display = "none";
        // expenseBox.style.display = "none";
    } else {
        vendortablemodal.style.display = "none";

    }
}