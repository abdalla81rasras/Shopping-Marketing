const header = document.querySelector(".header");
const links = document.querySelector(".product-tab-menu");
const link = document.querySelectorAll(".nav-link");

link.forEach((link)=>{
    link.addEventListener("click", (e) => {

        e.preventDefault();
    
        const id = e.currentTarget.getAttribute("href").slice(1);
        const element = document.getElementById(id);
    
        const navHeight = header.getBoundingClientRect().height;
    
        let position = element.offsetTop - navHeight;
    
        if (!header) {
            position = position - navHeight;
        }

        window.scrollTo({
          left: 0,
          top: position,
        });
    });
});