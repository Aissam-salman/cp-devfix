const fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg",
    "image/tiff",
    "image/webp",
    "image/x-icon",
];

const links = document.querySelectorAll('.container-nav-link');
let currentPage = window.location.pathname;

if (links.length > 0 || links !== undefined || links !== null) {
    links.forEach((link) => {
        if (link.children[0].getAttribute('href') === currentPage) {
            link.classList.add('active-page');
        }
    })
}

// preview logo file input for add marque
const inputImg = document.querySelector('#input-img');
const previewImg = document.querySelector('.preview-logo');




if (window.location.pathname.includes("/marque.html")) {
    if (inputImg !== undefined || inputImg !== null) {
        inputImg.addEventListener("change", updateImgDisplay);
    }
    // add from form
    const btnAdd = document.querySelector('.btn-add');
    if (btnAdd !== undefined || btnAdd !== null) {
        btnAdd.addEventListener('click', viewForm);
    }

    const btnCancel = document.querySelector('.btn-cancel');
    if (btnCancel !== undefined || btnCancel !== null) {
        btnCancel.addEventListener("click", maskForm)
    }

    // modif marque
    const cardsMarque = Array.from(document.querySelectorAll('.marque-card'))
    if (cardsMarque.length > 0 || cardsMarque !== undefined || cardsMarque !== null) {
        cardsMarque.forEach((card) => {
            card.addEventListener('click', (e) => {
                e.preventDefault();
                card.style.backgroundColor = "#273142";
                card.style.color = "#fff"
                viewForm();

                const nameMarque = card.dataset.marque;
                const inputNameMarque = document.querySelector('#input-name');
                inputNameMarque.value = nameMarque;

                while (previewImg.firstChild) {
                    previewImg.removeChild(previewImg.firstChild);
                }
                const imgPreview = document.createElement('img');
                imgPreview.src = card.children[1].src;

                previewImg.append(imgPreview);
            })
        });
    }


}


//modif pieces
if (window.location.pathname.includes("/pieces.html")) {
    if (inputImg !== undefined || inputImg !== null) {
        inputImg.addEventListener("change", updateImgDisplay);
    }
    // add from form
    const btnAdd = document.querySelector('.btn-add');
    if (btnAdd !== undefined || btnAdd !== null) {
        btnAdd.addEventListener('click', viewForm);
    }

    const btnCancel = document.querySelector('.btn-cancel');
    if (btnCancel !== undefined || btnCancel !== null) {
        btnCancel.addEventListener("click", maskForm)
    }
    const piecesBtn = Array.from(document.querySelectorAll('.show-piece'));
    if (piecesBtn.length > 0 || piecesBtn !== undefined || piecesBtn !== null) {
        piecesBtn.forEach((piece) => {
            piece.addEventListener('click', (e) => {
                e.preventDefault();
                piece.style.backgroundColor = "#273142";
                piece.style.color = "#fff"
                viewForm();

                const tr = piece.parentNode.parentNode;
                const tabTd = Array.from(piece.parentNode.parentNode.children);
                const pieceInfo = {
                    libelle: tabTd[1].textContent,
                    refFrabricant: tabTd[2].textContent,
                    prix: tabTd[3].textContent,
                    quantite: tabTd[4].textContent,
                    modeleCompatible: (tabTd[5].textContent).split(","),
                    delaiLivraison: tabTd[6].textContent,
                    marque: tr.dataset.marque,
                }
                console.log(pieceInfo);
                // la mettre dans le input lib
                document.querySelector('#input-name').value = pieceInfo.libelle;
                document.querySelector('#input-ref').value = pieceInfo.refFrabricant;
                document.querySelector('#input-ref').value = pieceInfo.refFrabricant;
                document.querySelector('#input-stock').value = pieceInfo.quantite;
                document.querySelector('#input-prix').value = pieceInfo.prix;
                document.querySelector('#input-delai').value = pieceInfo.delaiLivraison;

                const modeleSelect = document.querySelector('#modele');

                pieceInfo.modeleCompatible.forEach(modele => {
                    let isOptionExist = false;
                    Array.from(modeleSelect.options).forEach(option => {
                        if (option.value === modele) {
                            option.selected = true;
                            isOptionExist = true;
                        }
                    });

                    if (!isOptionExist) {
                        const newOption = document.createElement("option");
                        newOption.value = modele;
                        newOption.textContent = modele;
                        modeleSelect.appendChild(newOption);
                        newOption.selected = true; // Sélectionner la nouvelle option
                    }
                });

                const marqueSelect = document.querySelector('#marque');
                let marqueOptionExists = false;
                Array.from(marqueSelect.options).forEach(opt => {
                    if (opt.value === pieceInfo.marque) {
                        opt.selected = true;
                        marqueOptionExists = true;
                    }
                });

                while (previewImg.firstChild) {
                    previewImg.removeChild(previewImg.firstChild);
                }
                const imgPreview = document.createElement('img');
                imgPreview.src = tr.querySelector(".img-piece").src;
                previewImg.append(imgPreview);
            })
        });
    }
    const filterMarque = document.querySelector('#marque-filter');
    const tr = document.querySelector("tbody").querySelectorAll("tr");

    filterMarque.addEventListener("change", (e) => {
        filter(e.target.value, tr);
    })
}



function updateImgDisplay() {
    while (previewImg.firstChild) {
        previewImg.removeChild(previewImg.firstChild);
    }

    const currentFiles = inputImg.files;

    for (const file of currentFiles) {
        const imgPreview = document.createElement('img');
        if (!validFileType(file)) {
            return false;
        }
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.alt = file.name;
        previewImg.append(imgPreview);
    }
}

function validFileType(file) {
    return fileTypes.includes(file.type);
}


function viewForm() {
    const form = document.querySelector('.form-hidden');
    updateImgDisplay();
    const input = form.querySelectorAll("input");
    input.forEach((input) => input.value = "");
    if (form !== undefined || form !== null) {
        form.style.visibility = "visible";
        setTimeout(() => {
            form.style.opacity = '1';
            form.style.padding = '50px';
            if (window.innerWidth > 1440) {
                form.style.width = '40vw';
            } else {
                form.style.width = '100%';
            }
            form.style.margin = '1.25rem 1.875rem 1.875rem 1.25rem';
            form.style.position = 'relative';
        }, 100);
        setTimeout(() => form.style.height = 'auto', 300);
    }
}


function maskForm(e) {
    e.preventDefault();
    const form = document.querySelector('.form-hidden');
    if (form !== undefined || form !== null) {
        form.style.visibility = "hidden";
        setTimeout(() => {
            form.style.opacity = '0';
            form.style.padding = '0';
            form.style.width = '0';
            form.style.margin = '0';
            form.style.position = 'absolute';
        }, 50);
        setTimeout(() => form.style.height = '0', 100);
        resetColor(".marque-card", "#dcdde2");
        resetColor(".show-piece", "#FAFBFD");
    }
}

function resetColor(element, color) {
    const tab = Array.from(document.querySelectorAll(element))
    if (tab.length > 0 || tab !== undefined || tab !== null) {
        tab.forEach((card) => card.style.backgroundColor = color);
    }
}



function filter(filter, target) {
    Array.from(target).forEach(el => {
        if (el.dataset.marque == filter && filter !== "") {
            el.classList.remove("filter");
        } else if (filter === "") {
            el.classList.remove("filter");
        } else {
            el.classList.add("filter");
        }
    });
}


function displayNavBar() {
    const sidebar = document.querySelector('.side-bar');
    const closeBar = document.querySelector('.cancelShow')
    sidebar.classList.add('toggleShow');
    closeBar.style.display = "block";
}

function maskNavBar(){
    const sidebar = document.querySelector('.side-bar');
    const closeBar = document.querySelector('.cancelShow')
    sidebar.classList.remove('toggleShow');
    closeBar.style.display = "none";
}

const btnMenu = document.querySelector(".btn-menu");
const btnClose = document.querySelector(".cancelShow");
if(btnMenu !== undefined || btnMenu !== null){
    btnMenu.addEventListener("click", displayNavBar)
}
if(btnClose !== undefined || btnClose !== null){
    btnClose.addEventListener("click", maskNavBar)
}