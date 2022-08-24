import App from './App.js';
export default class SortTasks extends App {
    constructor(el) {
        super();
        this._el = el;
        this._elBtnsSort = this._el.querySelectorAll('[data-js-sort]');
        this._elToDoList = document.querySelector('[data-js-tasks]');

        this.init();
    }


    /**
     * Initialise les comportements
     */
    init() {
        for (let i = 0, l = this._elBtnsSort.length; i < l; i++) {
            this._elBtnsSort[i].addEventListener('click', function(e) {
                let ordre = e.target.dataset.jsSort;
                this.sort(ordre);
            }.bind(this));
        }
    }


    /**
     * Réordonne le tableau toDoList et appelle la méthode pour injecter les tâches mises à jour
     * @param {string} column 
     */
    sort(column) {
        toDoList.sort(function(a, b) {
            if (a[column] < b[column]) { return -1; }
            if (a[column] > b[column]) { return 1; }
            return 0;
        });
        
        // Réinjecte les tâches dans l'ordre
        this._elToDoList.innerHTML = '';
        for (let i = 0, l = toDoList.length; i < l; i++) {
            this.createTask(i);
        }
    }
}