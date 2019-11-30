$(document).ready(function() {
    $("#notes-add-button").on("click", function(){
        var notes_add_input = $("#notes-add-input").val().trim();

        if (notes_add_input == '') {
            return alert('Необходимо ввести название заметки.');
        }

        $.ajax({
            url: 'notes-processing.php',
            type: 'POST',
            cache: false,
            data: {'add-input': notes_add_input},
            dataType: 'html',
            beforeSend: function(){
                $("#notes-add-button").prop("disabled", true);
            },
            success: function(data){
                //alert(data);
                $("#notes-add-button").prop("disabled", false);
            }
        });

        const notesItem = createNotesItem(notesAddInput.value);
        notesList.appendChild(notesItem);
        notesAddInput.value = '';
    });



    function notesCreateElement(tag, props, ...children) {
        const notesElement = document.createElement(tag);

        Object.keys(props).forEach(key => notesElement[key] = props[key]);

        if (children.length > 0) {
            children.forEach(child => {
                if (typeof child === 'string') {
                    child = document.createTextNode(child);
                }

                notesElement.appendChild(child);
            });
        }

        return notesElement;
    }

    function createNotesItem(title) {
        const notesLabel = notesCreateElement('label', { className: 'title notes-title' }, title);
        const notesEditInput = notesCreateElement('input', { type: 'text', className: 'textfield', autocomplete: 'off' });
        let notesEditButton = notesCreateElement('button', { type: 'button', className: 'edit button' });
        notesEditButton.innerHTML = '<i class="fas fa-edit"></i>';
        let notesDeleteButton = notesCreateElement('button', { type: 'button', className: 'delete button' });
        notesDeleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';    
        let notesText = notesCreateElement('p', {className: 'notes-text'}, "Всем привет, я новая заметка!)");
        const notesListItem = notesCreateElement('form', { className: 'notes-item' }, notesLabel, notesEditInput, notesEditButton, notesDeleteButton, notesText);


        notesBindEvents(notesListItem);

        return notesListItem;
    }

    function notesBindEvents(notesItem) {
        const notesEditButton = notesItem.querySelector('button.edit');
        const notesDeleteButton = notesItem.querySelector('button.delete');
        //const notesText = notesItem.querySelector('notes-text');


        //notesSaveButton.addEventListener('click', saveNotesItem(notesItem));
        notesItem.addEventListener('click', chooseNotesItem);
        notesEditButton.addEventListener('click', editNotesItem);
        notesDeleteButton.addEventListener('click', deleteNotesItem);
    }

    function saveNotesItem(notesText) {
        const noteText = this.querySelector('.notes-text');
        notesText.innerText = notesTextarea.innerText;
    }

    function chooseNotesItem() {
        const notesTextarea = document.getElementById('notes-textarea');
        const noteCurrent = document.querySelector('.choosed');
        var noteText = noteCurrent.querySelector('.notes-text');
        console.log(noteText.innerText);
        console.log(notesTextarea.value);
        notesTextarea.value = notesTextarea.innerHTML;
        noteText.innerHTML = notesTextarea.value;
        noteCurrent.classList.remove('choosed');
        noteText = this.querySelector('.notes-text');
        this.classList.add('choosed');
        notesTextarea.value = noteText.innerHTML;
    }

    function editNotesItem() {
        const notesListItem = this.parentNode;
        const notesTitle = notesListItem.querySelector('.title');
        const notesEditInput = notesListItem.querySelector('.textfield');
        const notesIsEditing = notesListItem.classList.contains('editing');

        if (notesIsEditing) {
            $.ajax({
                url: 'notes-processing.php',
                type: 'POST',
                cache: false,
                data: {'notes_input': notesEditInput.value, 'notes_title': notesTitle.innerText},
                dataType: 'html'
            });
            notesTitle.innerText = notesEditInput.value;
            this.innerHTML = '<i class="fas fa-edit"></i>';

        } else {
            notesEditInput.value = notesTitle.innerText;
            this.innerHTML = '<i class="fas fa-check"></i>';
        }

        notesListItem.classList.toggle('editing');
    }

    function deleteNotesItem() {
        const notesListItem = this.parentNode;
        const notesTitle = notesListItem.querySelector('.title');
        $.ajax({
            url: 'notes-processing.php',
            type: 'POST',
            cache: false,
            data: {'notes_delete': notesTitle.innerText},
            dataType: 'html'
        });
        notesList.removeChild(notesListItem);
    }

    const notesForm = document.getElementById('notes-form');
    const notesAddInput = document.getElementById('notes-add-input');
    const notesList = document.getElementById('notes-list');
    const notesItems = document.querySelectorAll('.notes-item');
    const notesTextarea = document.getElementById('notes-textarea');

    const notesSaveButton = document.getElementById('notes-save');
    function main() {
        //notesForm.addEventListener('submit', addNotesItem);
        notesItems.forEach(item => notesBindEvents(item));
    }

    main();
});
