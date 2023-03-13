import axios from "axios";
import "./bootstrap";

class Books {
    constructor() {
        this.form = document.querySelector("#RatingForm");
    }
    
    init() {
        if (!this.form) return;
        this.authorChange();
        this.getBooks(1);
        this.booksDatalist = this.form.querySelector('#books');
    }
    
    authorChange() {
        this.authorSelector = this.form.querySelector("#author");
        let selectedAuthor = 0;

        this.authorSelector.addEventListener("change", () => {
            this.booksDatalist.textContent = '';
            selectedAuthor = this.authorSelector.value;
            this.getBooks(selectedAuthor);
        });
    }

    async getBooks(author) {
        const errorElm = this.form.querySelector("#errorAuthor");
        const url = window.location.origin;
        try {
            const { data } = await axios.get(`${url}/author/${author}`);
            this.setBooks(data?.books)
        } catch (error) {
            errorElm.innerText = "Books not found";
        }
    }
    setBooks(books = []){
        if (books.length < 0) return;

        books.forEach(book => {
            const option = document.createElement('option');
            option.value = book?.id;
            option.innerText = book?.title;
            this.booksDatalist.appendChild(option)
        })
    }
}

class Rating {
    constructor(){
        this.form = document.querySelector("#RatingForm");
    }
    init() {
        if (!this.form) return;
        this.handleRating();
    }
    handleRating(){

        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            console.log(e);
        })
    }
    saveRating(){

    }
}

document.addEventListener("DOMContentLoaded", () => {
    const books = new Books();
    const rating = new Rating();
    books.init();
    // rating.init();
});
