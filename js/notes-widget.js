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
            data: {'notes_title': notes_add_input},
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

        const notesTextarea = document.getElementById('notes-textarea');
        currentNote.querySelector('.notes-text').innerText = notesTextarea.value;
        currentNote.classList.remove('choosed');
        notesItem.classList.add('choosed');
        currentNote = document.querySelector('.choosed');
        notesTextarea.value = currentNote.querySelector('.notes-text').innerText;
    });

    $('#notes-add-input').keydown(function(e) {
    if(e.keyCode === 13) {
       var notes_add_input = $("#notes-add-input").val().trim();
       
        if (notes_add_input == '') {
            return alert('Необходимо ввести название заметки.');
        }

        $.ajax({
            url: 'notes-processing.php',
            type: 'POST',
            cache: false,
            data: {'notes_title': notes_add_input},
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

        const notesTextarea = document.getElementById('notes-textarea');
        currentNote.querySelector('.notes-text').innerText = notesTextarea.value;
        currentNote.classList.remove('choosed');
        notesItem.classList.add('choosed');
        currentNote = document.querySelector('.choosed');
        notesTextarea.value = currentNote.querySelector('.notes-text').innerText;
    }
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
        const notesTextarea = document.getElementById('notes-textarea');

        notesItem.addEventListener('click', chooseNotesItem);
        notesEditButton.addEventListener('click', editNotesItem);
        notesDeleteButton.addEventListener('click', deleteNotesItem);
        notesTextarea.addEventListener('change', saveNotesItem);
    }

    function saveNotesItem() {
        const currentNote = document.querySelector('.choosed');
        currentNote.querySelector('.notes-text').innerHTML = this.value;
        $.ajax({
            url: 'notes-processing.php',
            type: 'POST',
            cache: false,
            data: {'notes_text_title' : currentNote.querySelector('.notes-title').innerText, 'notes_text': this.value},
            dataType: 'html'
        });
    }

    function chooseNotesItem() {
        if (event.target.nodeName != 'I' && event.target.nodeName != 'BUTTON') {
            const notesTextarea = document.getElementById('notes-textarea');
            //currentNote.querySelector('.notes-text').innerHTML = notesTextarea.value;
            currentNote.classList.remove('choosed');
            this.classList.add('choosed');
            currentNote = document.querySelector('.choosed');
            notesTextarea.value = currentNote.querySelector('.notes-text').innerHTML;
        }
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
                data: {'notes_input': notesEditInput.value, 'notes_title_old': notesTitle.innerText},
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
        if (this.parentNode.classList.contains('choosed')){
            for (let notesItem of document.querySelectorAll('.notes-item')){
                if (!notesItem.classList.contains('choosed')){
                    currentNote = notesItem;
                    currentNote.classList.add('choosed');
                    notesTextarea.value = currentNote.querySelector('.notes-text').innerText;
                    break;
                }
            }
        }
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
    var currentNote = document.querySelector('.choosed');

    function main() {
        //notesForm.addEventListener('submit', addNotesItem);
        document.querySelector('.notes-item').classList.add('choosed');
        currentNote = document.querySelector('.choosed');
        notesTextarea.value = currentNote.querySelector('.notes-text').innerHTML;
        notesItems.forEach(item => notesBindEvents(item));
    }

    main();
});
