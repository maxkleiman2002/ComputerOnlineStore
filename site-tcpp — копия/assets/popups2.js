const popupLinks_edit = document.querySelectorAll('.popup-link-edit');
const body2 = document.querySelector('body');
const lockPadding_edit = document.querySelectorAll(".lock-padding-edit");

let unlock2 = true;
const timeout2 = 800;

if(popupLinks_edit.length > 0){
    for(let i = 0; i<popupLinks_edit.length;i++){
        const popupLink_edit = popupLinks_edit[i];
        popupLink_edit.addEventListener("click",function (e){
            const popupName_edit = popupLink_edit.getAttribute("href").replace("#","");
            const currentPopup_edit = document.getElementById(popupName_edit);
            console.log(currentPopup_edit);
            popupOpen(currentPopup_edit);
            e.preventDefault();
        });
    }
}
const popupCloseIcon_edit = document.querySelectorAll('.popup_close_edit');
if(popupCloseIcon_edit.length > 0){
    for(let i = 0; i < popupCloseIcon_edit.length;i++){
        const el_edit = popupCloseIcon_edit[i];
        el_edit.addEventListener('click',function (e){
            popupClose(el_edit.closest('.popup_edit'));
            e.preventDefault();
        });
    }
}

function popupOpen(currentPopup){
    if(currentPopup && unlock2){
        const popupActive_edit = document.querySelector('.popup_edit.open');
        if(popupActive_edit){
            popupClose(popupActive_edit,false);
        }
        else {
            bodyLock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener('click',function (e){
            if(!e.target.closest('.popup_edit-content')){
                popupClose(e.target.closest('.popup_edit'));
            }
        });
    }
}

function bodyLock(){
    const lockPaddingValue_edit = window.innerWidth - document.querySelector('.wrapp').offsetWidth + 'px';
    if(lockPadding_edit.length > 0) {
        for (let i = 0; i < lockPadding_edit.length; i++) {
            const el_edit = lockPadding_edit[i];
            el_edit.style.paddingRight = lockPaddingValue_edit;
        }
    }
    body2.style.paddingRight = lockPaddingValue_edit;
    body2.classList.add('lock');

    unlock2 = false;
    setTimeout(function (){
        unlock2= true;
    },timeout2);
}

function popupClose(popupActive,doUnlock = true){
    if(unlock2){
        popupActive.classList.remove('open');
        if(doUnlock){
            bodyUnLock();
        }
    }
}

function bodyUnLock(){
    setTimeout(function (){
        if(lockPadding_edit.length > 0) {
            for (let i = 0; i < lockPadding_edit.length; i++) {
                const el_edit = lockPadding_edit[i];
                el_edit.style.paddingRight = '0px';
            }
        }
        body2.style.paddingRight = '0px';
        body2.classList.remove('lock');
    },timeout2);

    unlock2 = false;
    setTimeout(function (){
        unlock2 = true;
    },timeout2);
}
document.addEventListener('keydown',function (e){
    if(e.which === 27){
        const popupActive_edit = document.querySelector('.popup_edit.open');
        popupClose(popupActive_edit);
    }
});

