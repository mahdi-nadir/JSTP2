import Task from './Task.js';
export default class App {
    constructor(el){
        this._el = el;
        this._elTemplateTask = document.querySelector('[data-js-template-task]');
        this._elDivTasks = document.querySelector('[data-js-tasks]');

    }
    /**
     * Construit, injecte et lance les comportements de chaque nouvelle tâche
     */

    createTask(tableau) {
        /* let objet = {
            id:tableau[0],
            tache:tableau[1],
            description:tableau[2],
            importance:tableau[3]
        } */

        let cloneTemplate = this._elTemplateTask.cloneNode(true); // clone le template
        
        for(const key in tableau){
            let regExp = new RegExp("{{" + key + "}}", "g"); 
            cloneTemplate.innerHTML = cloneTemplate.innerHTML.replace(regExp, tableau[key]); 
        }

        this._elDivTasks.append(cloneTemplate.content); 
        new Task(this._elTasks.lastElementChild); // on lance le comportement de la nouvelle tâche
    }
}