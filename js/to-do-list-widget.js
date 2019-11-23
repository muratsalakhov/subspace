$("#add-button").on("click", function(){
    var add_input = $("#add-input").val().trim();

    if (add_input == '') {
        return alert('Необходимо ввести название задачи.');
    }

    $.ajax({
        url: 'todo-processing.php',
        type: 'POST',
        cache: false,
        data: {'add-input': add_input},
        dataType: 'html',
        beforeSend: function(){
            $("#add-button").prop("disabled", true);
        },
        success: function(data){
            //alert(data);
            $("#add-button").prop("disabled", false);
        }
    });

    const todoItem = createTodoItem(addInput.value);
    todoList.appendChild(todoItem);
    addInput.value = '';
});



function createElement(tag, props, ...children) {
    const element = document.createElement(tag);

    Object.keys(props).forEach(key => element[key] = props[key]);

    if (children.length > 0) {
        children.forEach(child => {
            if (typeof child === 'string') {
                child = document.createTextNode(child);
            }

            element.appendChild(child);
        });
    }

    return element;
}

function createTodoItem(title) {
    const checkbox = createElement('input', { type: 'checkbox', className: 'checkbox todo-checkbox' });
    const label = createElement('label', { className: 'title todo-title' }, title);
    const editInput = createElement('input', { type: 'text', className: 'textfield', autocomplete: 'off' });
    let editButton = createElement('button', { type: 'button', className: 'edit button' });
    editButton.innerHTML = '<i class="fas fa-edit"></i>';
    let deleteButton = createElement('button', { type: 'button', className: 'delete button' });
    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
    const listItem = createElement('form', { className: 'todo-item' }, checkbox, label, editInput, editButton, deleteButton);

    bindEvents(listItem);

    return listItem;
}

function bindEvents(todoItem) {
    const checkbox = todoItem.querySelector('.checkbox');
    const editButton = todoItem.querySelector('button.edit');
    const deleteButton = todoItem.querySelector('button.delete');

    checkbox.addEventListener('change', checkTodoItem);
    editButton.addEventListener('click', editTodoItem);
    deleteButton.addEventListener('click', deleteTodoItem);
}


function checkTodoItem() {
    const listItem = this.parentNode;
    const title = listItem.querySelector('.todo-title');
    const checkbox = listItem.querySelector('.todo-checkbox');
    var checkbox_status;

    if (checkbox.checked) {
        checkbox_status = 1;
    } else {
        checkbox_status = 0;
    }

    $.ajax({
        url: 'todo-processing.php',
        type: 'POST',
        cache: false,
        data: {'todo_title': title.innerText, 'todo_checked' : checkbox_status},
        dataType: 'html'
    });

    listItem.classList.toggle('completed');
}

function editTodoItem() {
    const listItem = this.parentNode;
    const title = listItem.querySelector('.title');
    const editInput = listItem.querySelector('.textfield');
    const isEditing = listItem.classList.contains('editing');

    if (isEditing) {
        $.ajax({
            url: 'todo-processing.php',
            type: 'POST',
            cache: false,
            data: {'todo_input': editInput.value, 'todo_title': title.innerText},
            dataType: 'html'
        });
        title.innerText = editInput.value;
        this.innerHTML = '<i class="fas fa-edit"></i>';

    } else {
        editInput.value = title.innerText;
        this.innerHTML = '<i class="fas fa-check"></i>';
    }

    listItem.classList.toggle('editing');
}

function deleteTodoItem() {
    const listItem = this.parentNode;
    const title = listItem.querySelector('.title');
    $.ajax({
        url: 'todo-processing.php',
        type: 'POST',
        cache: false,
        data: {'todo_delete': title.innerText},
        dataType: 'html'
    });
    todoList.removeChild(listItem);
}

const todoForm = document.getElementById('todo-form');
const addInput = document.getElementById('add-input');
const todoList = document.getElementById('todo-list');
const todoItems = document.querySelectorAll('.todo-item');

function main() {

    //todoForm.addEventListener('submit', addTodoItem);
    todoItems.forEach(item => bindEvents(item));
}

main();

