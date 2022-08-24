/* import App from './App.js'; */
export default class Task /* extends App */ {
    constructor(el) {
       // super();
        this._el = el;
        this._index = this._el.dataset.jsTask;
        this._elBtnShowDetail = this._el.querySelector('[data-js-show-detail]');
        this._elBtnDelete = this._el.querySelector('[data-js-delete]');
        
        this._elToDoList = this._el.closest('[data-js-tasks]');
        this._elTaskDetail = document.querySelector('[data-js-task-detail]');

        this.init();
    }


    /**
     * Initialise les comportements
     */
    init() {
        this._elBtnShowDetail.addEventListener('click', this.showDetail.bind(this));
        this._elBtnDelete.addEventListener('click', this.delete.bind(this));
    }


    /**
     * Affiche le détail d'une tâche
     */
    showDetail() {
        /* Cas description */
        let description = 'Aucune description disponible.';
        if (toDoList[this._index].description != '') description = toDoList[this._index].description;

        let elDetailDom = `
                    <div class="detail__info">
                        <p><small>Tâche : </small>${toDoList[this._index].tache}</p>
                        <p><small>Description : </small>${description}</p>
                        <p><small>Importance : </small>${toDoList[this._index].importance}</p>
                    </div>`;

        this._elTaskDetail.innerHTML = elDetailDom;
    }


    /**
     * Supprime la tâche du tableau toDoList et appelle la méthode pour injecter les tâches mises à jour
     */
    delete() {
        let id = encodeURIComponent(this._index);

        formData = new FormData(),
        myInit = { 
            method: 'post',
            body: formData
        };
        formData.append('id', id);

        fetch('php/requeteAsyncSuppression.php', myInit)
            .then(function(response) {
                if (response.ok) {
                    return response.text();
                } else {
                    throw new Error('Erreur');
                }
            })
            .then(function(data) {
                this._el.remove();
            });

    }
}