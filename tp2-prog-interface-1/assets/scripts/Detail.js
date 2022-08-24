export default class Detail {
    constructor(el) {
        this._el = el;
        this._elChevron = this._el.querySelector('[data-js-chevron]');

        this.init();
    }


    /**
     * Initialise les comportements
     */
    init() {
        this._elChevron.addEventListener('click', this.showHideDetail.bind(this));
    }

    
    /**
     * Ouvre / ferme l'accordéon de la section détail d'une tâche
     */
    showHideDetail() {
        if (this._el.classList.contains('detail--ferme')) {
            this._el.classList.replace('detail--ferme', 'detail--ouvert');
            this._elChevron.classList.replace('chevron--bottom', 'chevron--top');
        } else {
            this._el.classList.replace('detail--ouvert', 'detail--ferme');
            this._elChevron.classList.replace('chevron--top', 'chevron--bottom');
        }
    }
}