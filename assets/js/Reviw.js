var review = document.querySelector(".review");
let item =3;

review.addEventListener("click" , function(){
    const grade_contents = [...document.querySelectorAll(".single-product-desc .grade-content")];

    for(let i = item ; i < item + 3 ; i++){
        grade_contents[i].style.display = 'block';
        grade_contents[i].style.opacity = 1;
        grade_contents[i].style.transition = '0.5s ease-out;';
    }

    item += 3;

    if(item >= grade_contents.length){
        review.style.display = 'none';
    }

});