// References to DOM Elements
const prevBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");
const book = document.querySelector("#book");

const papers = document.getElementsByClassName("paper")
// Event Listener
prevBtn.addEventListener("click", goPrevPage);
nextBtn.addEventListener("click", goNextPage);

// Business Logic
let currentLocation = 0;
let numOfPapers = papers.length;
let maxLocation = numOfPapers + 1;

let frontIndex = 0
let backIndex = papers.length
function openBook() {
    book.style.transform = "translateX(50%)";
    prevBtn.style.transform = "translateX(-220px)";
    nextBtn.style.transform = "translateX(180px)";
}

function closeBook(isAtBeginning) {
    if(isAtBeginning) {
        book.style.transform = "translateX(0%)";
    } else {
        book.style.transform = "translateX(100%)";
    }
    
    prevBtn.style.transform = "translateX(0px)";
    nextBtn.style.transform = "translateX(0px)";
}

function goNextPage() {
    if(currentLocation<maxLocation-1){
        openBook()
        // console.log(currentLocation);
        papers[currentLocation].style.zIndex = frontIndex;
        frontIndex++;
        backIndex--;
        papers[currentLocation].classList.add("flipped");
        // console.log(papers[currentLocation].style.zIndex)
        // papers[currentLocation]
        currentLocation++;
    }
    if(currentLocation == maxLocation-1){
        closeBook();
    }
}

function goPrevPage() {
    currentLocation--;
    // console.log(currentLocation)
    // for (let index = 0; index < papers.length; index++) {
    //     console.log(papers[index],papers[index].style.zIndex)
        
    // }
    // console.log(frontIndex,backIndex);
    if(currentLocation > -1) {
        openBook();
        // console.log(currentLocation)
        papers[currentLocation].classList.remove("flipped");
        papers[currentLocation].style.zIndex = backIndex;
        backIndex++;
        frontIndex--;
    }
    if(currentLocation == 0){
        closeBook(1);

    }
}