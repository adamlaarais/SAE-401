/*********************************************************
Fichier JS gérant l'accordéon de la foire aux questions
Permet l'ouverture et la fermeture interactive des réponses
*********************************************************/

const questions = document.querySelectorAll('.question');

questions.forEach(question => {
    question.addEventListener('click', () => {
        // recuperation du parent pour manipuler la classe active
        const container = question.parentElement;
        const isActive = container.classList.contains('active');

        // fermeture de toutes les autres questions pour un effet accordeon propre
        document.querySelectorAll('.question-container').forEach(c => {
            c.classList.remove('active');
        });

        // activation de la question selectionnee si elle etait fermee
        if (!isActive) {
            container.classList.add('active');
        }
    });
});