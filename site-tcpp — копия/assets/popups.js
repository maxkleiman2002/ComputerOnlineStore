const popupLinks = document.querySelectorAll('.popup-link');
const body1 = document.querySelector('body');
const lockPadding = document.querySelectorAll(".lock-padding");

let unlock = true;
const timeout = 800;

if(popupLinks.length > 0){
    for(let i = 0; i<popupLinks.length;i++){
        const popupLink = popupLinks[i];
        popupLink.addEventListener("click",function (e){
            const popupName = popupLink.getAttribute("href").replace("#","");
            const currentPopup = document.getElementById(popupName);
            console.log(currentPopup);
            popupOpen(currentPopup);
            e.preventDefault();
        });
    }
}
const popupCloseIcon = document.querySelectorAll('.close-popup');
if(popupCloseIcon.length > 0){
    for(let i = 0; i < popupCloseIcon.length;i++){
        const el = popupCloseIcon[i];
        el.addEventListener('click',function (e){
            popupClose(el.closest('.popup'));
            e.preventDefault();
        });
    }
}

function popupOpen(currentPopup){
    if(currentPopup && unlock){
        const popupActive = document.querySelector('.popup.open');
        if(popupActive){
            popupClose(popupActive,false);
        }
        else {
            bodyLock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener('click',function (e){
            if(!e.target.closest('.popup-content')){
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function bodyLock(){
    const lockPaddingValue = window.innerWidth - document.querySelector('.wrapp').offsetWidth + 'px';
    if(lockPadding.length > 0) {
        for (let i = 0; i < lockPadding.length; i++) {
            const el = lockPadding[i];
            el.style.paddingRight = lockPaddingValue;
        }
    }
    body1.style.paddingRight = lockPaddingValue;
    body1.classList.add('lock');

    unlock = false;
    setTimeout(function (){
        unlock = true;
    },timeout);
}

function popupClose(popupActive,doUnlock = true){
    if(unlock){
        popupActive.classList.remove('open');
        if(doUnlock){
            bodyUnLock();
        }
    }
}

function bodyUnLock(){
    setTimeout(function (){
        if(lockPadding.length > 0) {
            for (let i = 0; i < lockPadding.length; i++) {
                const el = lockPadding[i];
                el.style.paddingRight = '0px';
            }
        }
        body1.style.paddingRight = '0px';
        body1.classList.remove('lock');
    },timeout);

    unlock = false;
    setTimeout(function (){
        unlock = true;
    },timeout);
}
document.addEventListener('keydown',function (e){
    if(e.which === 27){
        const popupActive = document.querySelector('.popup.open');
        popupClose(popupActive);
    }
});

