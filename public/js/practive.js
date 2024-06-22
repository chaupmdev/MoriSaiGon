
const btnNext = document.querySelector('#next_question');
const btnPre = document.querySelector('#pre_question');
const listItem = document.querySelector('.list-item');
const totalQuesion = document.querySelector('#totalQuestion');
const listItemPractive = document.querySelectorAll('.item-practive');

let currentIndex = 0;
let countItem = Object.keys(listItemPractive).length

totalQuesion.innerHTML = `1/${countItem}`

btnNext.addEventListener('click', function(){
    if(currentIndex >= countItem - 1)
        return;
    currentIndex += 1;
    listItem.style.transform = `translateX(-${currentIndex * 100}%)`;
    totalQuesion.innerHTML = `${currentIndex + 1}/${countItem}`
});

btnPre.addEventListener('click', function(){
    if(currentIndex == 0)
        return;
    currentIndex -= 1;
    listItem.style.transform = `translateX(-${currentIndex * 100}%)`;
    totalQuesion.innerHTML = `${currentIndex + 1}/${countItem}`
});
