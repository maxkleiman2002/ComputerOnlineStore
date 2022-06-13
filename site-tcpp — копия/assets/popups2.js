const popupLinks2 = document.querySelectorAll('.popup-link2');
const body2 = document.querySelector('body');
const lockPadding2 = document.querySelectorAll(".lock-padding");

let unlock2 = true;
const timeout2 = 800;

if(popupLinks2.length > 0){
    for(let i = 0; i<popupLinks2.length;i++){
        const popupLink = popupLinks2[i];
        popupLink.addEventListener("click",function (e){
            const popupName = popupLink.getAttribute("href").replace("#","");
            const currentPopup = document.getElementById(popupName);
            console.log(currentPopup);
            popupOpen(currentPopup);
            e.preventDefault();
        });
    }
}
const popupCloseIcon2 = document.querySelectorAll('.close-popup2');
if(popupCloseIcon2.length > 0){
    for(let i = 0; i < popupCloseIcon2.length;i++){
        const el = popupCloseIcon2[i];
        el.addEventListener('click',function (e){
            popupClose(el.closest('.popup2'));
            e.preventDefault();
        });
    }
}

function popupOpen(currentPopup){
    if(currentPopup && unlock2){
        const popupActive = document.querySelector('.popup2.open');
        if(popupActive){
            popupClose(popupActive,false);
        }
        else {
            bodyLock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener('click',function (e){
            if(!e.target.closest('.popup-content2')){
                popupClose(e.target.closest('.popup2'));
            }
        });
    }
}

function bodyLock(){
    const lockPaddingValue = window.innerWidth - document.querySelector('.wrapp').offsetWidth + 'px';
    if(lockPadding2.length > 0) {
        for (let i = 0; i < lockPadding2.length; i++) {
            const el = lockPadding2[i];
            el.style.paddingRight = lockPaddingValue;
        }
    }
    body2.style.paddingRight = lockPaddingValue;
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
        if(lockPadding2.length > 0) {
            for (let i = 0; i < lockPadding2.length; i++) {
                const el = lockPadding2[i];
                el.style.paddingRight = '0px';
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
        const popupActive = document.querySelector('.popup2.open');
        popupClose(popupActive);
    }
});

